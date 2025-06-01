document.addEventListener("DOMContentLoaded", function () {
    function loadData() {
      

        const siswaList = document.getElementById("siswa-list");
        if (!siswaList) {
            setTimeout(loadData, 500); 
            return;
        }
        siswaList.innerHTML = ""; 

        const siswaData = [
            { id: 1, nisn: "0123456",  nama: "Vahira Nurfitria", kelas: "11 PPLG 2", poin: 45, spDiberikan: "" },
            { id: 2, nisn: "0789101",nama: "Mikazuki Arion", kelas: "11 PPLG 2", poin: 65, spDiberikan: "" },
            { id: 3,  nisn: "0121314",nama: "Key Oriesa", kelas: "11 PPLG 2", poin: 100, spDiberikan: "" }
        ];

        siswaData.forEach((siswa, index) => {
            const row = document.createElement("tr");

            let spOptions = `<option value="">Pilih SP</option>`;
            if (siswa.poin >= 40) spOptions += `<option value="SP1">SP1</option>`;
            if (siswa.poin >= 60) spOptions += `<option value="SP2">SP2</option>`;
            if (siswa.poin >= 80) spOptions += `<option value="SP3">SP3</option>`;

            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${siswa.nisn}</td>
                <td>${siswa.nama}</td>
                <td>${siswa.kelas}</td>
                <td class="poin">${siswa.poin}</td>
                <td>
                    <select class="sp-dropdown" data-id="${siswa.id}">
                        ${spOptions}
                    </select>
                    <button class="sp-btn btn btn-warning btn-sm" data-id="${siswa.id}" disabled>Kirim</button>
                </td>
                <td style="text-align: center;">
                    <a href="detail_edit.html?id=${siswa.id}" class="btn btn-td ">Edit</a>
                    <a href="detail_pelangggaran.html?id=${siswa.id}" class="btn btn-td ">Detail</a>
                </td>
                
            `;

            siswaList.appendChild(row);
        });

        // Event listener untuk tombol SP
        document.querySelectorAll(".sp-dropdown").forEach((dropdown) => {
            dropdown.addEventListener("change", function () {
                const siswaId = this.getAttribute("data-id");
                const btn = document.querySelector(`.sp-btn[data-id="${siswaId}"]`);
                btn.disabled = this.value === "";
            });
        });

        document.querySelectorAll(".sp-btn").forEach((button) => {
            button.addEventListener("click", function () {
                const siswaId = this.getAttribute("data-id");
                const dropdown = document.querySelector(`.sp-dropdown[data-id="${siswaId}"]`);
                const spJenis = dropdown.value;
                const siswa = siswaData.find(s => s.id == siswaId);

                if (siswa && spJenis) {
                    alert(`Surat ${spJenis} dikirim ke ${siswa.nama}!`);
                    siswa.spDiberikan = spJenis;
                    dropdown.disabled = true;
                    this.disabled = true;
                }
            });
        });
    }

    loadData(); 
});
