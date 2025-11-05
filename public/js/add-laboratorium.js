const fasilitasSelect = document.getElementById('fasilitas');
const jumlahFasilitas = document.getElementById('jumlah-fasilitas');
fasilitasSelect.addEventListener('change',()=>{
    console.log(fasilitasSelect.value);
    if (fasilitasSelect.value!= ''){
        jumlahFasilitas.classList.remove('hidden');
    }
    else if(!fasilitasSelect.value){
        jumlahFasilitas.classList.add('hidden');
    }
});