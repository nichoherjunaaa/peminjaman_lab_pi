const statusselect = document.getElementById('status');
const alasanPenolakan = document.getElementById('alasan-penolakan-container');
const setuju = document.getElementById('setuju-container');
console.log(statusselect);

statusselect.addEventListener('change', () => {
    if (statusselect.value === 'Tolak') {
        alasanPenolakan.classList.remove('hidden');
        setuju.classList.add('hidden');
        
        
    } else if(statusselect.value ==='Setuju') {
        alasanPenolakan.classList.add('hidden');
        setuju.classList.remove('hidden');
    }
});
