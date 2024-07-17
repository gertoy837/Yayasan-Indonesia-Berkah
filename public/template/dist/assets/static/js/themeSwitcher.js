// document.addEventListener('DOMContentLoaded', function() {
//     const themeSelect = document.getElementById('theme-select');
//     const body = document.body;

//     themeSelect.addEventListener('change', function() {
//         // Hapus semua kelas tema dari body
//         body.classList.remove('theme-light', 'theme-dark', 'theme-forest', 'theme-snow', 'theme-ricefield');

//         // Tambah kelas tema baru
//         const selectedTheme = themeSelect.value;
//         body.classList.add(`theme-${selectedTheme}`);

//         // Simpan tema di localStorage
//         localStorage.setItem('selectedTheme', selectedTheme);
//     });

//     // Ambil tema dari localStorage saat halaman dimuat
//     const savedTheme = localStorage.getItem('selectedTheme');
//     if (savedTheme) {
//         themeSelect.value = savedTheme;
//         body.classList.add(`theme-${savedTheme}`);
//     }
// });

document.addEventListener('DOMContentLoaded', function() {
  const body = document.body;

  // Ambil tema dari localStorage saat halaman dimuat
  const savedTheme = localStorage.getItem('selectedTheme');
  const customTheme = localStorage.getItem('customTheme');
  
  if (savedTheme) {
    body.classList.add(`theme-${savedTheme}`);
    document.querySelector(`[data-theme="${savedTheme}"]`).classList.add('active');
  }
  
  if (customTheme) {
    body.style.backgroundImage = `url(${customTheme})`;
    document.getElementById('customThemePreview').style.backgroundImage = `url(${customTheme})`;
  }
});

function selectTheme(element) {
  document.querySelectorAll('.theme-option').forEach(option => {
    option.classList.remove('active');
  });
  element.classList.add('active');
}

document.addEventListener('DOMContentLoaded', function() {
  const body = document.body;

  // Ambil tema dari localStorage saat halaman dimuat
  const savedTheme = localStorage.getItem('selectedTheme');
  const customTheme = localStorage.getItem('customTheme');
  
  if (savedTheme) {
    body.classList.add(`theme-${savedTheme}`);
    document.querySelector(`[data-theme="${savedTheme}"]`).classList.add('active');
  }
  
  if (customTheme) {
    body.style.backgroundImage = `url(${customTheme})`;
    document.getElementById('customThemePreview').style.backgroundImage = `url(${customTheme})`;
    document.querySelector('.delete-button').style.display = 'block';
  }
});

function selectTheme(element) {
  document.querySelectorAll('.theme-option').forEach(option => {
    option.classList.remove('active');
  });
  element.classList.add('active');
}

function saveTheme() {
  const activeThemeElement = document.querySelector('.theme-option.active');
  const body = document.body;
  
  // Hapus semua kelas tema dari body
  body.classList.remove('theme-forest', 'theme-snow', 'theme-ricefield');
  
  if (activeThemeElement) {
    const selectedTheme = activeThemeElement.getAttribute('data-theme');
    body.classList.add(`theme-${selectedTheme}`);
    localStorage.setItem('selectedTheme', selectedTheme);
    localStorage.removeItem('customTheme');
    body.style.backgroundImage = '';
  } else {
    const customTheme = localStorage.getItem('customTheme');
    if (customTheme) {
      body.style.backgroundImage = `url(${customTheme})`;
    }
  }

  // Tutup modal setelah menyimpan tema
  $('#themeModal').modal('hide');
}

function previewCustomTheme() {
  const input = document.getElementById('customThemeInput');
  const preview = document.getElementById('customThemePreview');
  const deleteButton = document.querySelector('.delete-button');
  
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    
    reader.onload = function(e) {
      preview.style.backgroundImage = `url(${e.target.result})`;
      localStorage.setItem('customTheme', e.target.result);
      document.querySelectorAll('.theme-option').forEach(option => {
        option.classList.remove('active');
      });
      deleteButton.style.display = 'block'; // Show delete button
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

function deleteCustomTheme() {
  const preview = document.getElementById('customThemePreview');
  const deleteButton = document.querySelector('.delete-button');
  preview.style.backgroundImage = '';
  localStorage.removeItem('customTheme');
  deleteButton.style.display = 'none'; // Hide delete button
}