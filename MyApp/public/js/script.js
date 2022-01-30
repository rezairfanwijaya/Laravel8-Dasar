let listMahasiswa = document.getElementsByTagName("td")
listMahasiswa[0].addEventListener("click", tampilkan)

function tampilkan(event) {
    alert("Cek Data Mahasiswa" + event.target.innerHTML)
}