<div class="modal fade" id="themeModal" tabindex="-1" aria-labelledby="themeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="themeModalLabel">Pilih Tema</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6 col-md-3 theme-option" data-theme="forest" onclick="selectTheme(this)">
                <div class="theme-preview" style="background-image: url('template/dist/assets/images/bulan.jpg');"></div>
              </div>
              <div class="col-6 col-md-3 theme-option" data-theme="snow" onclick="selectTheme(this)">
                <div class="theme-preview" style="background-image: url('template/dist/assets/images/salju.jpg');"></div>
              </div>
              <div class="col-6 col-md-3 theme-option" data-theme="ricefield" onclick="selectTheme(this)">
                <div class="theme-preview" style="background-image: url('template/dist/assets/images/pemandangan1.jpg');"></div>
              </div>
              <div id="customThemePreview" class="col-6 col-md-3 custom-theme-preview mt-3">
                <button class="delete-button" onclick="deleteCustomTheme()">×</button>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12">
                <h5>Unggah Tema Kustom</h5>
                <div class="upload-button" onclick="document.getElementById('customThemeInput').click()">
                  <i class="fas fa-plus"></i>
                </div>
                <input type="file" class="hidden-input" id="customThemeInput" accept="image/*" onchange="previewCustomTheme()">
                
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary" onclick="saveTheme()">Simpan</button>
        </div>
      </div>
    </div>
  </div>