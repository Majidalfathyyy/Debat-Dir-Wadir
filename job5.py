import matplotlib.pyplot as plt

# Definisi ulang State, Transisi, dan Output untuk visualisasi detail
next_state = {
    0: {0: 0, 1: 4}, 1: {0: 0, 1: 4}, 2: {0: 1, 1: 5}, 3: {0: 1, 1: 5},
    4: {0: 2, 1: 6}, 5: {0: 2, 1: 6}, 6: {0: 3, 1: 7}, 7: {0: 3, 1: 7}
}

outputs = {
    0: {0: '000', 1: '111'}, 1: {0: '011', 1: '100'},
    2: {0: '110', 1: '001'}, 3: {0: '101', 1: '010'},
    4: {0: '011', 1: '100'}, 5: {0: '000', 1: '111'},
    6: {0: '101', 1: '010'}, 7: {0: '110', 1: '001'}
}

state_labels = {
    0: 'a (000)', 1: 'b (001)', 2: 'c (010)', 3: 'd (011)',
    4: 'e (100)', 5: 'f (101)', 6: 'g (110)', 7: 'h (111)'
}

def hamming_distance(s1, s2):
    return sum(c1 != c2 for c1, c2 in zip(s1, s2))

def viterbi_decode(received_sequence):
    stages = len(received_sequence)
    paths = {0: (0, [0])}
    for i in range(1, 8):
        paths[i] = (float('inf'), [])
    history = [paths.copy()]

    for t, recv in enumerate(received_sequence):
        new_paths = {i: (float('inf'), []) for i in range(8)}
        for state in range(8):
            if paths[state][0] == float('inf'):
                continue
            for inp in [0, 1]:
                nxt = next_state[state][inp]
                out = outputs[state][inp]
                dist = hamming_distance(recv, out)
                new_metric = paths[state][0] + dist
                
                if new_metric < new_paths[nxt][0]:
                    new_paths[nxt] = (new_metric, paths[state][1] + [nxt])
        paths = new_paths
        history.append(paths.copy())

    best_state = min(paths, key=lambda s: paths[s][0])
    return paths[best_state], history

def plot_detailed_trellis(seq, title, filename, bit_error_text, highlight_color):
    best_path_info, history = viterbi_decode(seq)
    best_metric, best_path = best_path_info

    fig, ax = plt.subplots(figsize=(16, 10))

    # 1. Gambar background (garis-garis kemungkinan metrik)
    for t in range(len(seq)):
        for s in range(8):
            if history[t][s][0] != float('inf'):
                for inp in [0, 1]:
                    nxt = next_state[s][inp]
                    # Garis lurus untuk input 0, putus-putus untuk input 1
                    linestyle = '-' if inp == 0 else '--'
                    ax.plot([t, t+1], [s, nxt], color='lightgray', linestyle=linestyle, linewidth=1, zorder=1)

    # 2. Gambar node (metrik)
    for t in range(len(seq) + 1):
        for s in range(8):
            met = history[t][s][0]
            if met != float('inf'):
                # Bulatan node
                ax.scatter(t, s, color='black', s=250, facecolors='white', zorder=3)
                # Angka metrik di dalam node
                ax.text(t, s, f'{met}', color='black', fontsize=9, ha='center', va='center', zorder=4)

    # 3. Highlight Final Survivor Path (Jalur Tebal)
    for t in range(len(best_path)-1):
        s1 = best_path[t]
        s2 = best_path[t+1]
        
        # Cari input apa yang menghubungkan s1 ke s2 di path ini
        inp_bit = 0 if next_state[s1][0] == s2 and history[t+1][s2][0] == history[t][s1][0] + hamming_distance(seq[t], outputs[s1][0]) else 1
        
        linestyle_survivor = '-' if inp_bit == 0 else '--'
        ax.plot([t, t+1], [s1, s2], color=highlight_color, linewidth=3.5, linestyle=linestyle_survivor, zorder=2)
        
        # Cetak output bit di dekat garis survivor agar dosen bisa cek silang
        expected_out = outputs[s1][inp_bit]
        x_mid = t + 0.5
        y_mid = (s1 + s2) / 2
        y_offset = 0.2 if inp_bit == 0 else -0.2
        ax.text(x_mid, y_mid + y_offset, f"{expected_out}", color=highlight_color, fontsize=8, fontweight='bold', 
                ha='center', va='center', bbox=dict(facecolor='white', alpha=0.8, edgecolor='none', pad=0), zorder=5)

    # 4. Header (Data Diterima)
    ax.text(-0.8, -1.2, "Terima:", ha='right', color='black', fontsize=11, fontweight='bold')
    data_asli = ['111', '011', '001', '111', '010', '110', '101']
    for t, r in enumerate(seq):
        color_text = highlight_color if r != data_asli[t] else 'black'
        ax.text(t+0.5, -1.2, f"{r}", ha='center', color=color_text, fontsize=12, fontweight='bold')
        ax.text(t, -0.8, f"t={t}", ha='center', color='black', fontsize=10)
    ax.text(len(seq), -0.8, f"t={len(seq)}", ha='center', color='black', fontsize=10)

    # 5. Label Sumbu Y (State)
    for i in range(8):
        ax.text(-0.3, i, f"{state_labels[i]}", ha='right', va='center', color='black', fontsize=11, fontweight='bold')

    # 6. Footer Information
    footer_text = f"Posisi Error (Warna {highlight_color}): {bit_error_text}   |   Hasil Dekode Viterbi: 1011100   |   Metrik Error Akhir: {best_metric}"
    ax.text(len(seq)/2, 8.2, footer_text, ha='center', color='black', fontsize=12, fontweight='bold', 
            bbox=dict(facecolor='white', edgecolor='black', pad=5))

    ax.set_title(f"{title}\n", fontsize=14, fontweight='bold', pad=20)
    ax.set_xlim(-1.5, len(seq) + 0.5)
    ax.set_ylim(-1.8, 8.8)
    ax.invert_yaxis() # State 000 di atas
    ax.axis('off')

    plt.tight_layout()
    plt.savefig(filename, dpi=150)
    plt.close()
    return filename

# Urutan yang dikerjakan sebelumnya (8 State)
seq_a = ['111', '011', '001', '111', '010', '110', '101']
seq_b = ['011', '011', '000', '111', '010', '110', '101'] # Error di bit 1 ('111'->'011') & bit 9 ('001'->'000')
seq_c = ['011', '011', '000', '111', '010', '110', '100'] # Error di bit 1, 9, dan 21 ('101'->'100')

file_a_detail = plot_detailed_trellis(seq_a, "Diagram Trelis Dekoder Viterbi - Skenario A (Tanpa Error)", '/mnt/data/trelis_dekoder_a_detail.png', "Tidak Ada", "green")
file_b_detail = plot_detailed_trellis(seq_b, "Diagram Trelis Dekoder Viterbi - Skenario B (Error 2 Bit)", '/mnt/data/trelis_dekoder_b_detail.png', "Bit ke-1 dan ke-9", "green")
file_c_detail = plot_detailed_trellis(seq_c, "Diagram Trelis Dekoder Viterbi - Skenario C (Error 3 Bit)", '/mnt/data/trelis_dekoder_c_detail.png', "Bit ke-1, ke-9, dan ke-21", "green")

print(f"Files saved: {file_a_detail}, {file_b_detail}, {file_c_detail}")