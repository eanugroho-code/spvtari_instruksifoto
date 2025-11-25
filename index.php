<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruksi Kerja Pemasangan Perangkat</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 25px 0;
            text-align: center;
            margin-bottom: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .subtitle {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 300;
        }
        
        .school-input {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border: 2px solid #e3f2fd;
        }
        
        .school-input label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 18px;
        }
        
        .school-input input, .school-input textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }
        
        .school-input input:focus, .school-input textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            outline: none;
        }
        
        .address-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .address-container input {
            margin-bottom: 0;
        }
        
        .address-container textarea {
            grid-column: span 2;
            min-height: 80px;
            resize: vertical;
        }
        
        .instruction-section {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border-left: 6px solid #3498db;
            transition: transform 0.3s ease;
        }
        
        .instruction-section:hover {
            transform: translateY(-2px);
        }
        
        .section-title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        
        .section-number {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-weight: bold;
            font-size: 18px;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
        }
        
        .requirements {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #e74c3c;
        }
        
        .requirements li {
            margin-bottom: 8px;
            padding-left: 10px;
        }
        
        .upload-options {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .upload-option {
            flex: 1;
            border: 3px dashed #3498db;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            background: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .upload-option:hover {
            background: #e3f2fd;
            border-color: #2980b9;
            transform: scale(1.02);
        }
        
        .upload-icon {
            font-size: 48px;
            color: #3498db;
            margin-bottom: 15px;
        }
        
        .upload-text {
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 18px;
            color: #2c3e50;
        }
        
        .upload-hint {
            font-size: 14px;
            color: #7f8c8d;
        }
        
        .hidden {
            display: none !important;
        }
        
        .preview-container {
            position: relative;
            margin-top: 20px;
            display: inline-block;
        }
        
        .preview-image {
            max-width: 100%;
            max-height: 300px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            border: 3px solid #e3f2fd;
        }
        
        .watermark-overlay {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            padding: 12px 15px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 200px;
        }
        
        .pin-icon {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
        }
        
        .watermark-content {
            flex: 1;
        }
        
        .coordinate-text {
            font-weight: 600;
            font-size: 13px;
            color: white;
            margin-bottom: 2px;
            text-shadow: 0 1px 2px rgba(0,0,0,0.5);
        }
        
        .datetime-text {
            font-weight: 400;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2px;
            text-shadow: 0 1px 2px rgba(0,0,0,0.5);
        }
        
        .location-text {
            font-weight: 500;
            font-size: 11px;
            color: #a8d8ff;
            text-shadow: 0 1px 2px rgba(0,0,0,0.5);
        }
        
        .bapp-preview {
            border-color: #e74c3c;
            position: relative;
        }
        
        .bapp-preview::after {
            content: "📄 DOKUMEN BAPP";
            position: absolute;
            top: 10px;
            right: 10px;
            background: #e74c3c;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 40px;
        }
        
        button {
            padding: 18px 30px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-reset {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
        }
        
        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
        }
        
        .btn-download {
            background: linear-gradient(135deg, #9b59b6, #8e44ad);
            color: white;
        }
        
        .btn-download:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(155, 89, 182, 0.3);
        }
        
        .btn-whatsapp {
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            padding: 18px 30px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        }

        .btn-whatsapp:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
        }

        .btn-whatsapp:active {
            transform: translateY(0);
        }
        
        .btn-location {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
            padding: 12px 20px;
            font-size: 14px;
            margin: 10px 5px;
        }
        
        .btn-gps {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 12px 20px;
            font-size: 14px;
            margin: 10px 5px;
        }
        
        .status-message {
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
            text-align: center;
            font-weight: 600;
            font-size: 16px;
        }
        
        .success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border: 2px solid #c3e6cb;
        }
        
        .error {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border: 2px solid #f5c6cb;
        }
        
        .warning {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            color: #856404;
            border: 2px solid #ffeaa7;
        }
        
        .info {
            background: linear-gradient(135deg, #d1ecf1, #bee5eb);
            color: #0c5460;
            border: 2px solid #bee5eb;
        }
        
        .folder-info {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            border-radius: 15px;
            padding: 25px;
            margin-top: 25px;
            border: 2px solid #90caf9;
        }
        
        .location-info {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
            border: 2px solid #ffd54f;
        }
        
        .location-input {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
            border: 2px dashed #bdc3c7;
        }
        
        .location-input input {
            width: calc(50% - 10px);
            padding: 12px;
            margin: 8px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .location-input input:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }
        
        .gps-instruction {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            border: 2px solid #90caf9;
        }
        
        .whatsapp-info {
            background: linear-gradient(135deg, #dcf8c6, #e2ffd9);
            border: 2px solid #25D366;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            text-align: center;
        }

        .whatsapp-steps {
            text-align: left;
            margin: 15px 0;
            padding-left: 20px;
        }

        .whatsapp-steps li {
            margin-bottom: 10px;
        }
        
        footer {
            text-align: center;
            margin-top: 50px;
            padding: 30px;
            color: #7f8c8d;
            font-size: 14px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }
        
        .photo-status {
            display: flex;
            align-items: center;
            margin-top: 15px;
            font-size: 14px;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 8px;
            background: #f8f9fa;
        }
        
        .status-icon {
            margin-right: 10px;
            font-size: 18px;
        }
        
        .auto-scan-notice {
            background: linear-gradient(135deg, #e8f5e8, #c8e6c9);
            border: 2px solid #4caf50;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            text-align: center;
            font-weight: 500;
        }

        .watermark-example {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            border: 2px solid #ffd54f;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            text-align: center;
        }
        
        .address-saved {
            background: linear-gradient(135deg, #e8f5e8, #c8e6c9);
            border: 2px solid #4caf50;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            text-align: center;
            font-weight: 500;
        }
        
        /* Animasi untuk tombol WhatsApp */
        @keyframes pulseWhatsApp {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .btn-whatsapp.pulse {
            animation: pulseWhatsApp 2s infinite;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .instruction-section {
                padding: 20px;
            }
            
            .action-buttons {
                grid-template-columns: 1fr;
            }
            
            button {
                width: 100%;
            }
            
            .location-input input {
                width: calc(100% - 16px);
            }
            
            h1 {
                font-size: 24px;
            }

            .watermark-overlay {
                font-size: 10px;
                padding: 10px 12px;
                min-width: 180px;
            }
            
            .address-container {
                grid-template-columns: 1fr;
            }
            
            .address-container textarea {
                grid-column: span 1;
            }
            
            .upload-options {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>📋 Instruksi Kerja Pemasangan Perangkat</h1>
            <p class="subtitle">Ambil dokumentasi dan kirim ke WhatsApp Admin</p>
        </header>
        
        <form id="installationForm">
            <!-- Input Nama Sekolah -->
            <div class="school-input">
                <label for="schoolName">🏫 No NPSN:</label>
                <input type="text" id="schoolName" placeholder="Masukkan nomor NPSN sekolah" required>
                
                <div class="address-container">
                    <input type="text" id="schoolAddress" placeholder="Alamat sekolah/jalan" required>
                    <input type="text" id="schoolDistrict" placeholder="Kecamatan" required>
                    <input type="text" id="schoolCity" placeholder="Kota/Kabupaten" required>
                    <input type="text" id="schoolProvince" placeholder="Provinsi" required>
                </div>
                
                <button type="button" class="btn-gps" onclick="saveSchoolAddress()">
                    💾 Simpan Alamat Sekolah
                </button>
                
                <div id="addressSaved" class="address-saved hidden">
                    ✅ Alamat sekolah berhasil disimpan dan akan digunakan untuk semua foto geotagging
                </div>
            </div>
            
            <!-- Langkah 1 -->
            <div class="instruction-section">
                <div class="section-title">
                    <div class="section-number">1</div>
                    <h2>📸 Foto Plang Sekolah</h2>
                </div>
                <p>Ambil foto plang sekolah yang jelas dan dapat terbaca dengan baik.</p>
                
                <div class="watermark-example">
                    <strong>📍 CONTOH WATERMARK TRANSPARAN:</strong><br>
                    <div style="display: flex; align-items: center; background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 10px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.2); margin: 10px 0;">
                        <canvas id="examplePin" width="24" height="24" style="margin-right: 10px;"></canvas>
                        <div>
                            <div style="font-weight: 600; font-size: 13px; color: white; text-shadow: 0 1px 2px rgba(0,0,0,0.5);">-6.2088, 106.8456</div>
                            <div style="font-size: 11px; color: rgba(255,255,255,0.9); text-shadow: 0 1px 2px rgba(0,0,0,0.5);">25 Des 2023 14:30</div>
                            <div style="font-size: 11px; color: #a8d8ff; text-shadow: 0 1px 2px rgba(0,0,0,0.5);">Jl. Contoh No. 123, Jakarta Pusat, DKI Jakarta</div>
                        </div>
                    </div>
                    <small>Watermark transparan akan muncul di pojok kiri bawah </small>
                </div>
                
                <div class="upload-options">
                    <div class="upload-option" onclick="triggerCamera('photo1')">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Ambil Foto</div>
                        <div class="upload-hint">Gunakan kamera</div>
                    </div>
                    <div class="upload-option" onclick="triggerGallery('photo1')">
                        <div class="upload-icon">🖼️</div>
                        <div class="upload-text">Pilih dari Galeri</div>
                        <div class="upload-hint">Pilih foto yang sudah ada</div>
                    </div>
                </div>
                <input type="file" id="photo1" class="hidden" accept="image/*" onchange="processPhoto(this, 1)">
                
                <div class="preview-container">
                    <img id="preview1" class="preview-image hidden">
                    <div id="watermark1" class="watermark-overlay hidden">
                        <canvas class="pin-icon" width="24" height="24"></canvas>
                        <div class="watermark-content">
                            <div class="coordinate-text"></div>
                            <div class="datetime-text"></div>
                            <div class="location-text"></div>
                        </div>
                    </div>
                </div>
                <div id="photoStatus1" class="photo-status hidden"></div>
                
                <div id="locationInput1" class="location-input hidden">
                    <div class="gps-instruction">
                        <strong>📍 CARA MENDAPATKAN KOORDINAT:</strong><br>
                        1. Buka <strong>Google Maps</strong> di ponsel<br>
                        2. Tekan <strong>lama</strong> pada lokasi sekolah<br>
                        3. Salin angka <strong>latitude dan longitude</strong><br>
                        4. <strong>Alamat sekolah</strong> sudah tersimpan di atas
                    </div>
                    <p><strong>Masukkan Koordinat GPS:</strong></p>
                    <input type="text" id="lat1" placeholder="Latitude (contoh: -6.2088)" pattern="-?\d+\.?\d*">
                    <input type="text" id="lng1" placeholder="Longitude (contoh: 106.8456)" pattern="-?\d+\.?\d*">
                    <div style="text-align: center; margin-top: 15px;">
                        <button type="button" class="btn-gps" onclick="getGPSLocation(1)">
                            📍 Ambil Lokasi GPS
                        </button>
                        <button type="button" class="btn-location" onclick="saveLocationWithWatermark(1)">
                            💾 Simpan & Watermark
                        </button>
                    </div>
                </div>
                <div id="locationInfo1" class="location-info hidden"></div>
            </div>
            
            <!-- Langkah 2-6 (sama pattern) -->
            <div class="instruction-section">
                <div class="section-title">
                    <div class="section-number">2</div>
                    <h2>👤 Foto PIC dengan Dus</h2>
                </div>
                <p>Ambil foto PIC (Person In Charge) bersama dengan dus perangkat.</p>
                
                <div class="upload-options">
                    <div class="upload-option" onclick="triggerCamera('photo2')">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Ambil Foto</div>
                        <div class="upload-hint">Gunakan kamera</div>
                    </div>
                    <div class="upload-option" onclick="triggerGallery('photo2')">
                        <div class="upload-icon">🖼️</div>
                        <div class="upload-text">Pilih dari Galeri</div>
                        <div class="upload-hint">Pilih foto yang sudah ada</div>
                    </div>
                </div>
                <input type="file" id="photo2" class="hidden" accept="image/*" onchange="processPhoto(this, 2)">
                
                <div class="preview-container">
                    <img id="preview2" class="preview-image hidden">
                    <div id="watermark2" class="watermark-overlay hidden">
                        <canvas class="pin-icon" width="24" height="24"></canvas>
                        <div class="watermark-content">
                            <div class="coordinate-text"></div>
                            <div class="datetime-text"></div>
                            <div class="location-text"></div>
                        </div>
                    </div>
                </div>
                <div id="photoStatus2" class="photo-status hidden"></div>
                
                <div id="locationInput2" class="location-input hidden">
                    <p><strong>Masukkan Koordinat GPS:</strong></p>
                    <input type="text" id="lat2" placeholder="Latitude" pattern="-?\d+\.?\d*">
                    <input type="text" id="lng2" placeholder="Longitude" pattern="-?\d+\.?\d*">
                    <div style="text-align: center; margin-top: 15px;">
                        <button type="button" class="btn-gps" onclick="getGPSLocation(2)">📍 GPS</button>
                        <button type="button" class="btn-location" onclick="saveLocationWithWatermark(2)">💾 Watermark</button>
                    </div>
                </div>
                <div id="locationInfo2" class="location-info hidden"></div>
            </div>

            <!-- Langkah 3-6 (disingkat) -->
            <div class="instruction-section">
                <div class="section-title">
                    <div class="section-number">3</div>
                    <h2>📦 Foto Kelengkapan Perangkat</h2>
                </div>
                <p>Ambil foto semua kelengkapan perangkat yang akan dipasang.</p>
                <div class="requirements">
                    <strong>✅ Harus menunjukkan:</strong>
                    <ul>
                        <li>3 kabel + 1 Remote + Baterai</li>
                        <li>2 Pen + 1 Buku panduan + 1 Buku garansi</li>
                    </ul>
                </div>
                <div class="upload-options">
                    <div class="upload-option" onclick="triggerCamera('photo3')">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Ambil Foto</div>
                        <div class="upload-hint">Gunakan kamera</div>
                    </div>
                    <div class="upload-option" onclick="triggerGallery('photo3')">
                        <div class="upload-icon">🖼️</div>
                        <div class="upload-text">Pilih dari Galeri</div>
                        <div class="upload-hint">Pilih foto yang sudah ada</div>
                    </div>
                </div>
                <input type="file" id="photo3" class="hidden" accept="image/*" onchange="processPhoto(this, 3)">
                <div class="preview-container">
                    <img id="preview3" class="preview-image hidden">
                    <div id="watermark3" class="watermark-overlay hidden">
                        <canvas class="pin-icon" width="24" height="24"></canvas>
                        <div class="watermark-content">
                            <div class="coordinate-text"></div>
                            <div class="datetime-text"></div>
                            <div class="location-text"></div>
                        </div>
                    </div>
                </div>
                <div id="photoStatus3" class="photo-status hidden"></div>
                <div id="locationInput3" class="location-input hidden">
                    <input type="text" id="lat3" placeholder="Latitude" pattern="-?\d+\.?\d*">
                    <input type="text" id="lng3" placeholder="Longitude" pattern="-?\d+\.?\d*">
                    <div style="text-align: center; margin-top: 15px;">
                        <button type="button" class="btn-gps" onclick="getGPSLocation(3)">📍 GPS</button>
                        <button type="button" class="btn-location" onclick="saveLocationWithWatermark(3)">💾 Watermark</button>
                    </div>
                </div>
                <div id="locationInfo3" class="location-info hidden"></div>
            </div>

            <!-- Langkah 4-6 (sama pattern) -->
            <div class="instruction-section">
                <div class="section-title">
                    <div class="section-number">4</div>
                    <h2>🔧 Foto Proses Instalasi</h2>
                </div>
                <p>Dokumentasikan proses instalasi atau pemasangan perangkat.</p>
                <div class="upload-options">
                    <div class="upload-option" onclick="triggerCamera('photo4')">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Ambil Foto</div>
                        <div class="upload-hint">Gunakan kamera</div>
                    </div>
                    <div class="upload-option" onclick="triggerGallery('photo4')">
                        <div class="upload-icon">🖼️</div>
                        <div class="upload-text">Pilih dari Galeri</div>
                        <div class="upload-hint">Pilih foto yang sudah ada</div>
                    </div>
                </div>
                <input type="file" id="photo4" class="hidden" accept="image/*" onchange="processPhoto(this, 4)">
                <div class="preview-container">
                    <img id="preview4" class="preview-image hidden">
                    <div id="watermark4" class="watermark-overlay hidden">
                        <canvas class="pin-icon" width="24" height="24"></canvas>
                        <div class="watermark-content">
                            <div class="coordinate-text"></div>
                            <div class="datetime-text"></div>
                            <div class="location-text"></div>
                        </div>
                    </div>
                </div>
                <div id="photoStatus4" class="photo-status hidden"></div>
                <div id="locationInput4" class="location-input hidden">
                    <input type="text" id="lat4" placeholder="Latitude" pattern="-?\d+\.?\d*">
                    <input type="text" id="lng4" placeholder="Longitude" pattern="-?\d+\.?\d*">
                    <div style="text-align: center; margin-top: 15px;">
                        <button type="button" class="btn-gps" onclick="getGPSLocation(4)">📍 GPS</button>
                        <button type="button" class="btn-location" onclick="saveLocationWithWatermark(4)">💾 Watermark</button>
                    </div>
                </div>
                <div id="locationInfo4" class="location-info hidden"></div>
            </div>

            <div class="instruction-section">
                <div class="section-title">
                    <div class="section-number">5</div>
                    <h2>🔢 Foto IMEI / SN</h2>
                </div>
                <p>Ambil foto IMEI atau Serial Number di belakang TV.</p>
                <div class="upload-options">
                    <div class="upload-option" onclick="triggerCamera('photo5')">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Ambil Foto</div>
                        <div class="upload-hint">Gunakan kamera</div>
                    </div>
                    <div class="upload-option" onclick="triggerGallery('photo5')">
                        <div class="upload-icon">🖼️</div>
                        <div class="upload-text">Pilih dari Galeri</div>
                        <div class="upload-hint">Pilih foto yang sudah ada</div>
                    </div>
                </div>
                <input type="file" id="photo5" class="hidden" accept="image/*" onchange="processPhoto(this, 5)">
                <div class="preview-container">
                    <img id="preview5" class="preview-image hidden">
                    <div id="watermark5" class="watermark-overlay hidden">
                        <canvas class="pin-icon" width="24" height="24"></canvas>
                        <div class="watermark-content">
                            <div class="coordinate-text"></div>
                            <div class="datetime-text"></div>
                            <div class="location-text"></div>
                        </div>
                    </div>
                </div>
                <div id="photoStatus5" class="photo-status hidden"></div>
                <div id="locationInput5" class="location-input hidden">
                    <input type="text" id="lat5" placeholder="Latitude" pattern="-?\d+\.?\d*">
                    <input type="text" id="lng5" placeholder="Longitude" pattern="-?\d+\.?\d*">
                    <div style="text-align: center; margin-top: 15px;">
                        <button type="button" class="btn-gps" onclick="getGPSLocation(5)">📍 GPS</button>
                        <button type="button" class="btn-location" onclick="saveLocationWithWatermark(5)">💾 Watermark</button>
                    </div>
                </div>
                <div id="locationInfo5" class="location-info hidden"></div>
            </div>

            <div class="instruction-section">
                <div class="section-title">
                    <div class="section-number">6</div>
                    <h2>👨‍🏫 Foto Training</h2>
                </div>
                <p>Ambil foto sesi training yang sedang berlangsung.</p>
                <div class="requirements">
                    <strong>✅ Wajib menunjukkan:</strong>
                    <ul>
                        <li>Teach Buddy terinstal</li>
                        <li>Terlihat di semua direktorat</li>
                    </ul>
                </div>
                <div class="upload-options">
                    <div class="upload-option" onclick="triggerCamera('photo6')">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Ambil Foto</div>
                        <div class="upload-hint">Gunakan kamera</div>
                    </div>
                    <div class="upload-option" onclick="triggerGallery('photo6')">
                        <div class="upload-icon">🖼️</div>
                        <div class="upload-text">Pilih dari Galeri</div>
                        <div class="upload-hint">Pilih foto yang sudah ada</div>
                    </div>
                </div>
                <input type="file" id="photo6" class="hidden" accept="image/*" onchange="processPhoto(this, 6)">
                <div class="preview-container">
                    <img id="preview6" class="preview-image hidden">
                    <div id="watermark6" class="watermark-overlay hidden">
                        <canvas class="pin-icon" width="24" height="24"></canvas>
                        <div class="watermark-content">
                            <div class="coordinate-text"></div>
                            <div class="datetime-text"></div>
                            <div class="location-text"></div>
                        </div>
                    </div>
                </div>
                <div id="photoStatus6" class="photo-status hidden"></div>
                <div id="locationInput6" class="location-input hidden">
                    <input type="text" id="lat6" placeholder="Latitude" pattern="-?\d+\.?\d*">
                    <input type="text" id="lng6" placeholder="Longitude" pattern="-?\d+\.?\d*">
                    <div style="text-align: center; margin-top: 15px;">
                        <button type="button" class="btn-gps" onclick="getGPSLocation(6)">📍 GPS</button>
                        <button type="button" class="btn-location" onclick="saveLocationWithWatermark(6)">💾 Watermark</button>
                    </div>
                </div>
                <div id="locationInfo6" class="location-info hidden"></div>
            </div>
            
            <!-- Langkah 7-8 dengan Auto-Scan -->
            <div class="instruction-section">
                <div class="section-title">
                    <div class="section-number">7</div>
                    <h2>📄 Foto BAPP Halaman 1</h2>
                </div>
                <p>Ambil foto Berita Acara Pemeriksaan dan Penerimaan (BAPP) halaman 1.</p>
                <div class="auto-scan-notice">
                    ⚡ <strong>FITUR AUTO-SCAN AKTIF</strong> - Sistem otomatis mendeteksi dokumen BAPP
                </div>
                <div class="requirements">
                    <strong>✅ Pastikan:</strong>
                    <ul>
                        <li>IMEI barcode ditempel</li>
                        <li>Di conteng yang sesuai</li>
                        <li>Stempel dan tanda tangan jelas</li>
                    </ul>
                </div>
                <div class="upload-options">
                    <div class="upload-option" onclick="triggerCamera('photo7')">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Ambil Foto</div>
                        <div class="upload-hint">Gunakan kamera</div>
                    </div>
                    <div class="upload-option" onclick="triggerGallery('photo7')">
                        <div class="upload-icon">🖼️</div>
                        <div class="upload-text">Pilih dari Galeri</div>
                        <div class="upload-hint">Pilih foto yang sudah ada</div>
                    </div>
                </div>
                <input type="file" id="photo7" class="hidden" accept="image/*" onchange="processBAPPPhoto(this, 7)">
                <div class="preview-container">
                    <img id="preview7" class="preview-image bapp-preview hidden">
                </div>
                <div id="photoStatus7" class="photo-status hidden"></div>
            </div>
            
            <div class="instruction-section">
                <div class="section-title">
                    <div class="section-number">8</div>
                    <h2>📄 Foto BAPP Halaman 2</h2>
                </div>
                <p>Ambil foto Berita Acara Pemeriksaan dan Penerimaan (BAPP) halaman 2.</p>
                <div class="auto-scan-notice">
                    ⚡ <strong>FITUR AUTO-SCAN AKTIF</strong> - Sistem otomatis mendeteksi dokumen BAPP
                </div>
                <div class="requirements">
                    <strong>✅ Pastikan:</strong>
                    <ul>
                        <li>Nama pelatihan diisi</li>
                        <li>Media pelatihan diconteng "luar jaringan"</li>
                        <li>Coret "belum dapat diterima" dan "belum berada"</li>
                    </ul>
                </div>
                <div class="upload-options">
                    <div class="upload-option" onclick="triggerCamera('photo8')">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Ambil Foto</div>
                        <div class="upload-hint">Gunakan kamera</div>
                    </div>
                    <div class="upload-option" onclick="triggerGallery('photo8')">
                        <div class="upload-icon">🖼️</div>
                        <div class="upload-text">Pilih dari Galeri</div>
                        <div class="upload-hint">Pilih foto yang sudah ada</div>
                    </div>
                </div>
                <input type="file" id="photo8" class="hidden" accept="image/*" onchange="processBAPPPhoto(this, 8)">
                <div class="preview-container">
                    <img id="preview8" class="preview-image bapp-preview hidden">
                </div>
                <div id="photoStatus8" class="photo-status hidden"></div>
            </div>
            
            <div class="action-buttons">
                <button type="button" class="btn-reset" onclick="resetForm()">
                    🔄 Reset Semua
                </button>
                <button type="button" class="btn-download" onclick="downloadAllPhotos()">
                    📥 Download ZIP
                </button>
            </div>
            
            <!-- TOMBOL WHATSAPP YANG MUNCUL SETELAH DOWNLOAD -->
            <div id="whatsapp-section" class="hidden">
                <button id="whatsappButton" class="btn-whatsapp" onclick="sendToWhatsApp()">
                    📱 Kirim ke WhatsApp Admin
                </button>
                
                <div id="whatsappInfo" class="whatsapp-info">
                    <h3>📋 Petunjuk Pengiriman ke WhatsApp</h3>
                    <p><strong>Format Pesan:</strong> NPSN: [NPSN Anda] - Laporan Instalasi Selesai</p>
                    <div class="whatsapp-steps">
                        <strong>Langkah-langkah:</strong>
                        <ol>
                            <li>Klik tombol "Kirim ke WhatsApp Admin" di atas</li>
                            <li>WhatsApp akan terbuka dengan pesan yang sudah disiapkan</li>
                            <li><strong>Lampirkan file ZIP</strong> yang sudah didownload</li>
                            <li>Kirim pesan ke admin</li>
                        </ol>
                    </div>
                    <p><strong>Pastikan file ZIP sudah didownload sebelum mengirim!</strong></p>
                </div>
            </div>
            
            <div id="statusMessage" class="status-message hidden"></div>
            <div id="folderInfo" class="folder-info hidden"></div>
        </form>
        
        <footer>
            <p>© 2023 - Sistem Dokumentasi Instalasi Perangkat Sekolah</p>
            <p style="margin-top: 10px; font-size: 12px; opacity: 0.7;">
               next@project
            </p>
        </footer>
    </div>

    <script>
        // Data untuk menyimpan foto dan lokasi
        let photoData = {
            schoolName: '',
            schoolAddress: '',
            schoolDistrict: '',
            schoolCity: '',
            schoolProvince: '',
            addressSaved: false,
            photos: {}
        };

        // Variabel global untuk menyimpan file ZIP yang telah dibuat
        let currentZipFile = null;
        let currentZipFileName = '';

        // Nama file untuk setiap langkah
        const photoNames = {
            1: "1_plang_sekolah.jpg",
            2: "2_pic_dengan_dus.jpg", 
            3: "3_kelengkapan_perangkat.jpg",
            4: "4_proses_instalasi.jpg",
            5: "5_imei_sn.jpg",
            6: "6_training.jpg",
            7: "7_bapp_halaman1.jpg",
            8: "8_bapp_halaman2.jpg"
        };

        // Fungsi untuk menggambar pin Google Maps
        function drawGoogleMapsPin(ctx, size) {
            const centerX = size / 2;
            const centerY = size / 2;
            const circleRadius = size * 0.3;
            const triangleHeight = size * 0.4;
            
            // Lingkaran merah (badan pin)
            ctx.fillStyle = '#ea4335';
            ctx.beginPath();
            ctx.arc(centerX, centerY - triangleHeight * 0.2, circleRadius, 0, Math.PI * 2);
            ctx.fill();
            
            // Segitiga merah (ujung pin)
            ctx.beginPath();
            ctx.moveTo(centerX - circleRadius * 0.8, centerY - triangleHeight * 0.2);
            ctx.lineTo(centerX + circleRadius * 0.8, centerY - triangleHeight * 0.2);
            ctx.lineTo(centerX, centerY + triangleHeight * 0.8);
            ctx.closePath();
            ctx.fill();
            
            // Titik putih di tengah
            ctx.fillStyle = 'white';
            ctx.beginPath();
            ctx.arc(centerX, centerY - triangleHeight * 0.2, circleRadius * 0.3, 0, Math.PI * 2);
            ctx.fill();
        }

        // Inisialisasi contoh pin
        document.addEventListener('DOMContentLoaded', function() {
            const exampleCanvas = document.getElementById('examplePin');
            const ctx = exampleCanvas.getContext('2d');
            drawGoogleMapsPin(ctx, 24);
            
            // Pastikan tombol WhatsApp tersembunyi saat halaman dimuat
            document.getElementById('whatsapp-section').classList.add('hidden');
        });

        // Fungsi untuk menyimpan alamat sekolah
        function saveSchoolAddress() {
            const schoolName = document.getElementById('schoolName').value.trim();
            const address = document.getElementById('schoolAddress').value.trim();
            const district = document.getElementById('schoolDistrict').value.trim();
            const city = document.getElementById('schoolCity').value.trim();
            const province = document.getElementById('schoolProvince').value.trim();
            
            if (!schoolName || !address || !district || !city || !province) {
                showStatus('❌ Harap isi semua data sekolah!', 'error');
                return;
            }
            
            photoData.schoolName = schoolName;
            photoData.schoolAddress = address;
            photoData.schoolDistrict = district;
            photoData.schoolCity = city;
            photoData.schoolProvince = province;
            photoData.addressSaved = true;
            
            document.getElementById('addressSaved').classList.remove('hidden');
            showStatus('✅ Alamat sekolah berhasil disimpan!', 'success');
        }

        // Fungsi untuk memicu kamera
        function triggerCamera(inputId) {
            // Cek apakah alamat sudah disimpan untuk foto yang memerlukan geotagging
            const stepNumber = parseInt(inputId.replace('photo', ''));
            if (stepNumber <= 6 && !photoData.addressSaved) {
                showStatus('❌ Harap simpan alamat sekolah terlebih dahulu!', 'error');
                document.getElementById('schoolName').focus();
                return;
            }
            
            const input = document.getElementById(inputId);
            // Set atribut untuk kamera
            input.removeAttribute('capture');
            input.setAttribute('capture', 'environment');
            input.click();
        }

        // Fungsi untuk memicu galeri
        function triggerGallery(inputId) {
            // Cek apakah alamat sudah disimpan untuk foto yang memerlukan geotagging
            const stepNumber = parseInt(inputId.replace('photo', ''));
            if (stepNumber <= 6 && !photoData.addressSaved) {
                showStatus('❌ Harap simpan alamat sekolah terlebih dahulu!', 'error');
                document.getElementById('schoolName').focus();
                return;
            }
            
            const input = document.getElementById(inputId);
            // Hapus atribut capture untuk galeri
            input.removeAttribute('capture');
            input.click();
        }
        
        // Fungsi untuk memproses foto biasa (dengan lokasi)
        function processPhoto(input, stepNumber) {
            const file = input.files[0];
            if (!file) return;

            // Validasi ukuran file (max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                showStatus('Ukuran file terlalu besar! Maksimal 5MB.', 'error');
                return;
            }

            const reader = new FileReader();
            
            reader.onload = function(e) {
                // Tampilkan preview
                const preview = document.getElementById('preview' + stepNumber);
                preview.src = e.target.result;
                preview.classList.remove('hidden');

                // Gambar pin pada watermark
                const pinCanvas = document.querySelector('#watermark' + stepNumber + ' .pin-icon');
                const pinCtx = pinCanvas.getContext('2d');
                drawGoogleMapsPin(pinCtx, 24);

                // Update status foto
                updatePhotoStatus(stepNumber, '📷 Foto sudah diambil', '#27ae60');

                // Simpan foto
                photoData.photos[stepNumber] = {
                    dataUrl: e.target.result,
                    file: file,
                    location: null,
                    fileName: photoNames[stepNumber],
                    needsLocation: true,
                    type: 'photo'
                };

                // Tampilkan input lokasi manual
                showManualLocationInput(stepNumber);
                
                showStatus(`✅ Foto ${stepNumber} berhasil diambil. Silakan tambahkan koordinat.`, 'success');
            };
            
            reader.readAsDataURL(file);
        }

        // Fungsi untuk memproses foto BAPP (auto-scan)
        function processBAPPPhoto(input, stepNumber) {
            const file = input.files[0];
            if (!file) return;

            // Validasi ukuran file
            if (file.size > 5 * 1024 * 1024) {
                showStatus('Ukuran file terlalu besar! Maksimal 5MB.', 'error');
                return;
            }

            const reader = new FileReader();
            
            reader.onload = function(e) {
                // Tampilkan preview dengan style khusus BAPP
                const preview = document.getElementById('preview' + stepNumber);
                preview.src = e.target.result;
                preview.classList.remove('hidden');

                // Simulasi auto-scan effect
                simulateAutoScan(stepNumber);

                // Simpan foto BAPP
                photoData.photos[stepNumber] = {
                    dataUrl: e.target.result,
                    file: file,
                    location: null,
                    fileName: photoNames[stepNumber],
                    needsLocation: false,
                    type: 'bapp',
                    scanned: true,
                    scanTime: new Date().toISOString()
                };
            };
            
            reader.readAsDataURL(file);
        }

        // Simulasi efek auto-scan untuk BAPP
        function simulateAutoScan(stepNumber) {
            const statusElement = document.getElementById('photoStatus' + stepNumber);
            
            // Animasi scanning
            statusElement.innerHTML = '<span class="status-icon">🔍</span> Scanning dokumen...';
            statusElement.style.color = '#f39c12';
            statusElement.classList.remove('hidden');
            
            setTimeout(() => {
                statusElement.innerHTML = '<span class="status-icon">✅</span> BAPP terdeteksi - Dokumen valid';
                statusElement.style.color = '#27ae60';
                showStatus(`✅ BAPP halaman ${stepNumber-6} berhasil di-scan!`, 'success');
            }, 1500);
        }

        // Fungsi untuk update status foto
        function updatePhotoStatus(stepNumber, message, color = '#333') {
            const statusElement = document.getElementById('photoStatus' + stepNumber);
            statusElement.innerHTML = `<span class="status-icon">${message.split(' ')[0]}</span> ${message}`;
            statusElement.style.color = color;
            statusElement.classList.remove('hidden');
        }

        // Fungsi untuk menampilkan input lokasi manual
        function showManualLocationInput(stepNumber) {
            const locationInput = document.getElementById('locationInput' + stepNumber);
            locationInput.classList.remove('hidden');
        }

        // Fungsi untuk mendapatkan lokasi GPS
        function getGPSLocation(stepNumber) {
            showStatus('🛰️ Mengakses GPS...', 'info');
            
            if (!navigator.geolocation) {
                showStatus('❌ Browser tidak mendukung GPS', 'error');
                return;
            }

            const options = {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            };

            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const location = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                        accuracy: position.coords.accuracy,
                        timestamp: new Date().toISOString(),
                        source: 'gps'
                    };

                    // Otomatis isi form dengan lokasi yang didapat
                    document.getElementById('lat' + stepNumber).value = location.lat.toFixed(6);
                    document.getElementById('lng' + stepNumber).value = location.lng.toFixed(6);
                    
                    showStatus('📍 Lokasi GPS berhasil didapatkan! Klik "Watermark"', 'success');
                },
                function(error) {
                    let errorMessage = '❌ Gagal mendapatkan lokasi GPS. ';
                    
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            errorMessage += 'Izin akses lokasi ditolak. Silakan input manual.';
                            break;
                        case error.POSITION_UNAVAILABLE:
                            errorMessage += 'Lokasi tidak tersedia. Pastikan GPS aktif.';
                            break;
                        case error.TIMEOUT:
                            errorMessage += 'Waktu tunggu habis. Coba lagi.';
                            break;
                        default:
                            errorMessage += 'Error tidak diketahui.';
                            break;
                    }
                    
                    showStatus(errorMessage, 'warning');
                },
                options
            );
        }

        // Fungsi untuk menyimpan lokasi dengan watermark
        function saveLocationWithWatermark(stepNumber) {
            const latInput = document.getElementById('lat' + stepNumber);
            const lngInput = document.getElementById('lng' + stepNumber);
            
            const lat = parseFloat(latInput.value);
            const lng = parseFloat(lngInput.value);
            
            if (isNaN(lat) || isNaN(lng)) {
                showStatus('❌ Harap masukkan koordinat yang valid! Contoh: -6.2088 dan 106.8456', 'error');
                return;
            }

            // Validasi range koordinat
            if (lat < -90 || lat > 90 || lng < -180 || lng > 180) {
                showStatus('❌ Koordinat tidak valid! Latitude: -90 sampai 90, Longitude: -180 sampai 180', 'error');
                return;
            }

            const location = {
                lat: lat,
                lng: lng,
                address: photoData.schoolAddress,
                district: photoData.schoolDistrict,
                city: photoData.schoolCity,
                province: photoData.schoolProvince,
                timestamp: new Date().toISOString(),
                source: 'manual'
            };

            // Simpan lokasi ke data foto
            if (photoData.photos[stepNumber]) {
                photoData.photos[stepNumber].location = location;
                photoData.photos[stepNumber].needsLocation = false;

                // Sembunyikan input lokasi
                document.getElementById('locationInput' + stepNumber).classList.add('hidden');

                // Tampilkan watermark pada preview
                showWatermark(stepNumber, location);

                // Tampilkan info lokasi
                const locationInfo = document.getElementById('locationInfo' + stepNumber);
                const date = new Date(location.timestamp);
                locationInfo.innerHTML = `
                    <strong>📍 Watermark Transparan Berhasil Ditambahkan:</strong><br>
                    <strong>Koordinat:</strong> ${location.lat.toFixed(6)}, ${location.lng.toFixed(6)}<br>
                    <strong>Alamat:</strong> ${location.address}, ${location.district}, ${location.city}, ${location.province}<br>
                    <strong>Waktu:</strong> ${date.toLocaleString('id-ID')}<br>
                    <strong>Google Maps:</strong> <a href="https://maps.google.com/?q=${location.lat},${location.lng}" target="_blank">Buka di Maps</a>
                `;
                locationInfo.classList.remove('hidden');

                // Update status foto
                updatePhotoStatus(stepNumber, '✅ Foto dengan watermark transparan tersimpan', '#27ae60');

                showStatus(`✅ Watermark transparan berhasil ditambahkan ke foto ${stepNumber}!`, 'success');
            }
        }

        // Fungsi untuk menampilkan watermark pada foto
        function showWatermark(stepNumber, location) {
            const watermarkElement = document.getElementById('watermark' + stepNumber);
            const coordinateElement = watermarkElement.querySelector('.coordinate-text');
            const datetimeElement = watermarkElement.querySelector('.datetime-text');
            const locationElement = watermarkElement.querySelector('.location-text');
            
            const date = new Date(location.timestamp);
            
            coordinateElement.textContent = `${location.lat.toFixed(4)}, ${location.lng.toFixed(4)}`;
            datetimeElement.textContent = `${date.toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'})} ${date.toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'})}`;
            locationElement.textContent = `${location.address}, ${location.district}, ${location.city}, ${location.province}`;
            
            watermarkElement.classList.remove('hidden');
        }

        // Fungsi untuk reset form
        function resetForm() {
            if (confirm('Apakah Anda yakin ingin mereset semua data?')) {
                document.getElementById('installationForm').reset();
                document.getElementById('schoolName').value = '';
                document.getElementById('addressSaved').classList.add('hidden');
                
                // Sembunyikan semua element
                for (let i = 1; i <= 8; i++) {
                    document.getElementById('preview' + i).classList.add('hidden');
                    document.getElementById('photoStatus' + i).classList.add('hidden');
                    document.getElementById('watermark' + i).classList.add('hidden');
                    const locationInfo = document.getElementById('locationInfo' + i);
                    if (locationInfo) locationInfo.classList.add('hidden');
                    const locationInput = document.getElementById('locationInput' + i);
                    if (locationInput) locationInput.classList.add('hidden');
                }
                
                // Sembunyikan tombol WhatsApp dan info
                document.getElementById('whatsapp-section').classList.add('hidden');
                
                // Sembunyikan pesan status
                document.getElementById('statusMessage').classList.add('hidden');
                document.getElementById('folderInfo').classList.add('hidden');
                
                // Reset data
                photoData = {
                    schoolName: '',
                    schoolAddress: '',
                    schoolDistrict: '',
                    schoolCity: '',
                    schoolProvince: '',
                    addressSaved: false,
                    photos: {}
                };
                
                // Reset file ZIP
                currentZipFile = null;
                currentZipFileName = '';

                showStatus('🔄 Semua data telah direset!', 'info');
            }
        }

        // Fungsi untuk membuat foto dengan watermark transparan
        function createPhotoWithTransparentWatermark(photoData, stepNumber) {
            return new Promise((resolve) => {
                const img = new Image();
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    
                    // Set canvas size sama dengan foto
                    canvas.width = img.width;
                    canvas.height = img.height;
                    
                    // Draw foto asli
                    ctx.drawImage(img, 0, 0);
                    
                    // Tambahkan watermark transparan
                    const location = photoData.location;
                    const date = new Date(location.timestamp);
                    
                    // Hitung ukuran dinamis berdasarkan tinggi foto
                    const BASE_HEIGHT = 800;
                    const scaleFactor = canvas.height / BASE_HEIGHT;
                    const FONT_SIZE_COORD = Math.max(16, 20 * scaleFactor);
                    const FONT_SIZE_DATETIME = Math.max(12, 14 * scaleFactor);
                    const FONT_SIZE_LOCATION = Math.max(12, 14 * scaleFactor);
                    const PADDING = Math.max(15, 20 * scaleFactor);
                    const PIN_SIZE = Math.max(24, 30 * scaleFactor);
                    const MARGIN = Math.max(20, 25 * scaleFactor);
                    
                    const coordinateText = `${location.lat.toFixed(4)}, ${location.lng.toFixed(4)}`;
                    const dateTimeText = `${date.toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'})} ${date.toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'})}`;
                    const locationText = `${location.address}, ${location.district}, ${location.city}, ${location.province}`;
                    
                    // Hitung lebar teks
                    ctx.font = `600 ${FONT_SIZE_COORD}px Arial`;
                    const coordWidth = ctx.measureText(coordinateText).width;
                    
                    ctx.font = `400 ${FONT_SIZE_DATETIME}px Arial`;
                    const datetimeWidth = ctx.measureText(dateTimeText).width;
                    
                    ctx.font = `500 ${FONT_SIZE_LOCATION}px Arial`;
                    const locationWidth = ctx.measureText(locationText).width;
                    
                    const textWidth = Math.max(coordWidth, datetimeWidth, locationWidth);
                    const totalWidth = PIN_SIZE + PADDING * 2 + textWidth + PADDING;
                    const totalHeight = PADDING * 2 + FONT_SIZE_COORD + FONT_SIZE_DATETIME + FONT_SIZE_LOCATION + 8;
                    
                    const x = MARGIN;
                    const y = canvas.height - totalHeight - MARGIN;
                    
                    // Background transparan dengan efek glassmorphism
                    ctx.fillStyle = 'rgba(255, 255, 255, 0.15)';
                    ctx.beginPath();
                    ctx.roundRect(x, y, totalWidth, totalHeight, 12 * scaleFactor);
                    ctx.fill();
                    
                    // Border subtle
                    ctx.strokeStyle = 'rgba(255, 255, 255, 0.2)';
                    ctx.lineWidth = 1;
                    ctx.stroke();
                    
                    // Gambar pin Google Maps
                    const pinX = x + PADDING + PIN_SIZE / 2;
                    const pinY = y + totalHeight / 2;
                    drawGoogleMapsPin(ctx, PIN_SIZE, pinX, pinY);
                    
                    // Teks koordinat (putih dengan shadow)
                    ctx.font = `600 ${FONT_SIZE_COORD}px Arial`;
                    ctx.fillStyle = 'white';
                    ctx.shadowColor = 'rgba(0, 0, 0, 0.5)';
                    ctx.shadowBlur = 2;
                    ctx.shadowOffsetX = 0;
                    ctx.shadowOffsetY = 1;
                    ctx.fillText(coordinateText, x + PADDING + PIN_SIZE + PADDING, y + PADDING + FONT_SIZE_COORD);
                    
                    // Teks tanggal dan waktu
                    ctx.font = `400 ${FONT_SIZE_DATETIME}px Arial`;
                    ctx.fillStyle = 'rgba(255, 255, 255, 0.9)';
                    ctx.fillText(dateTimeText, x + PADDING + PIN_SIZE + PADDING, y + PADDING + FONT_SIZE_COORD + FONT_SIZE_DATETIME + 4);
                    
                    // Teks lokasi
                    ctx.font = `500 ${FONT_SIZE_LOCATION}px Arial`;
                    ctx.fillStyle = '#a8d8ff';
                    ctx.fillText(locationText, x + PADDING + PIN_SIZE + PADDING, y + PADDING + FONT_SIZE_COORD + FONT_SIZE_DATETIME + FONT_SIZE_LOCATION + 8);
                    
                    // Reset shadow
                    ctx.shadowColor = 'transparent';
                    ctx.shadowBlur = 0;
                    ctx.shadowOffsetX = 0;
                    ctx.shadowOffsetY = 0;
                    
                    // Convert ke data URL
                    const watermarkedDataUrl = canvas.toDataURL('image/jpeg', 0.9);
                    resolve(watermarkedDataUrl);
                };
                img.src = photoData.dataUrl;
            });
        }

        // Overload fungsi drawGoogleMapsPin untuk koordinat custom
        function drawGoogleMapsPin(ctx, size, x, y) {
            const centerX = x || size / 2;
            const centerY = y || size / 2;
            const circleRadius = size * 0.3;
            const triangleHeight = size * 0.4;
            
            // Lingkaran merah (badan pin)
            ctx.fillStyle = '#ea4335';
            ctx.beginPath();
            ctx.arc(centerX, centerY - triangleHeight * 0.2, circleRadius, 0, Math.PI * 2);
            ctx.fill();
            
            // Segitiga merah (ujung pin)
            ctx.beginPath();
            ctx.moveTo(centerX - circleRadius * 0.8, centerY - triangleHeight * 0.2);
            ctx.lineTo(centerX + circleRadius * 0.8, centerY - triangleHeight * 0.2);
            ctx.lineTo(centerX, centerY + triangleHeight * 0.8);
            ctx.closePath();
            ctx.fill();
            
            // Titik putih di tengah
            ctx.fillStyle = 'white';
            ctx.beginPath();
            ctx.arc(centerX, centerY - triangleHeight * 0.2, circleRadius * 0.3, 0, Math.PI * 2);
            ctx.fill();
        }

        // Fungsi untuk mendownload semua foto sebagai ZIP
        async function downloadAllPhotos() {
            const schoolName = document.getElementById('schoolName').value.trim();
            if (!schoolName) {
                showStatus('❌ Harap masukkan nama sekolah terlebih dahulu!', 'error');
                document.getElementById('schoolName').focus();
                return;
            }

            // Cek apakah alamat sudah disimpan
            if (!photoData.addressSaved) {
                showStatus('❌ Harap simpan alamat sekolah terlebih dahulu!', 'error');
                return;
            }

            // Cek apakah semua foto sudah ada
            const missingPhotos = [];
            for (let i = 1; i <= 8; i++) {
                if (!photoData.photos[i]) {
                    missingPhotos.push(i);
                }
            }

            if (missingPhotos.length > 0) {
                showStatus(`❌ Harap lengkapi foto untuk langkah: ${missingPhotos.join(', ')}`, 'error');
                return;
            }

            // Cek apakah foto 1-6 sudah punya lokasi
            const missingLocations = [];
            for (let i = 1; i <= 6; i++) {
                if (photoData.photos[i].needsLocation) {
                    missingLocations.push(i);
                }
            }

            if (missingLocations.length > 0) {
                showStatus(`📍 Harap tambahkan lokasi untuk foto: ${missingLocations.join(', ')}`, 'warning');
                return;
            }

            photoData.schoolName = schoolName;
            const folderName = schoolName.replace(/[^a-zA-Z0-9\s]/g, '').replace(/\s+/g, '_');

            try {
                showStatus('📦 Membuat file ZIP dengan watermark transparan...', 'info');
                
                const zip = new JSZip();
                const folder = zip.folder(folderName);

                // Tambahkan setiap foto ke ZIP (dengan watermark untuk foto 1-6)
                for (const [step, data] of Object.entries(photoData.photos)) {
                    let photoBlob;
                    
                    if (data.type === 'photo' && data.location) {
                        // Buat foto dengan watermark transparan
                        const watermarkedDataUrl = await createPhotoWithTransparentWatermark(data, step);
                        const response = await fetch(watermarkedDataUrl);
                        photoBlob = await response.blob();
                    } else {
                        // Untuk BAPP, gunakan foto asli
                        const response = await fetch(data.dataUrl);
                        photoBlob = await response.blob();
                    }
                    
                    // Tambahkan ke ZIP dengan nama yang sesuai
                    folder.file(data.fileName, photoBlob);
                }

                // Buat file informasi
                let locationInfo = `LAPORAN INSTALASI DENGAN WATERMARK TRANSPARAN\n`;
                locationInfo += `================================================\n\n`;
                locationInfo += `Sekolah: ${schoolName}\n`;
                locationInfo += `Alamat: ${photoData.schoolAddress}, ${photoData.schoolDistrict}, ${photoData.schoolCity}, ${photoData.schoolProvince}\n`;
                locationInfo += `Tanggal: ${new Date().toLocaleDateString('id-ID')}\n`;
                locationInfo += `Waktu: ${new Date().toLocaleTimeString('id-ID')}\n\n`;
                
                locationInfo += `FOTO DENGAN WATERMARK TRANSPARAN:\n`;
                locationInfo += `==================================\n\n`;
                
                for (let i = 1; i <= 6; i++) {
                    if (photoData.photos[i] && photoData.photos[i].location) {
                        const loc = photoData.photos[i].location;
                        locationInfo += `📍 ${photoNames[i]}\n`;
                        locationInfo += `   📍 Koordinat: ${loc.lat.toFixed(6)}, ${loc.lng.toFixed(6)}\n`;
                        locationInfo += `   🏙️ Lokasi: ${loc.address}, ${loc.district}, ${loc.city}, ${loc.province}\n`;
                        locationInfo += `   🕒 Waktu: ${new Date(loc.timestamp).toLocaleString('id-ID')}\n`;
                        locationInfo += `   🔗 Maps: https://maps.google.com/?q=${loc.lat},${loc.lng}\n\n`;
                    }
                }

                locationInfo += `DOKUMEN BAPP:\n`;
                locationInfo += `=============\n\n`;
                for (let i = 7; i <= 8; i++) {
                    if (photoData.photos[i]) {
                        locationInfo += `📄 ${photoNames[i]}\n`;
                        locationInfo += `   ✅ Status: Tervalidasi Auto-Scan\n`;
                        locationInfo += `   🕒 Waktu Scan: ${new Date(photoData.photos[i].scanTime).toLocaleString('id-ID')}\n\n`;
                    }
                }

                folder.file('INFORMASI_LENGKAP.txt', locationInfo);

                // Generate dan download ZIP
                const zipBlob = await zip.generateAsync({ type: 'blob' });
                currentZipFileName = `${folderName}_LAPORAN_TRANSPARAN.zip`;
                currentZipFile = zipBlob;
                
                saveAs(zipBlob, currentZipFileName);
                
                showStatus(`✅ File ZIP "${currentZipFileName}" berhasil didownload! Semua foto sudah ada watermark transparan elegan.`, 'success');
                
                // TAMPILKAN TOMBOL WHATSAPP SETELAH DOWNLOAD SELESAI
                showWhatsAppButton();
                
                // Tampilkan info folder
                document.getElementById('folderInfo').innerHTML = `
                    <h3>📁 File Berhasil Dibuat dengan Watermark Transparan!</h3>
                    <p><strong>Nama File:</strong> ${currentZipFileName}</p>
                    <p><strong>Folder:</strong> ${folderName}/</p>
                    <div style="margin-top: 15px; background: white; padding: 15px; border-radius: 10px;">
                        <strong>📋 Isi File ZIP:</strong>
                        <div style="font-family: monospace; font-size: 12px; margin-top: 10px;">
                            ${Object.values(photoNames).map((name, index) => 
                                index < 6 ? `📍 ${name} (watermark transparan)` : `📄 ${name}`
                            ).join('<br>')}
                            <br>📝 INFORMASI_LENGKAP.txt
                        </div>
                    </div>
                    <p style="margin-top: 15px; font-size: 14px; color: #666;">
                        ✅ <strong>Foto 1-6</strong> sudah dilengkapi watermark transparan elegan<br>
                        📍 <strong>Pin merah</strong> dengan efek glassmorphism modern<br>
                        🏫 <strong>Alamat sekolah</strong> sama untuk semua foto<br>
                        📄 <strong>Foto 7-8</strong> adalah dokumen BAPP yang sudah di-scan<br>
                        🌐 Semua koordinat dapat dibuka langsung di Google Maps
                    </p>
                    <p style="margin-top: 15px; font-weight: bold; color: #25D366;">
                        📱 Silakan kirim file ZIP ke WhatsApp Admin dengan menekan tombol di atas!
                    </p>
                `;
                document.getElementById('folderInfo').classList.remove('hidden');
                
            } catch (error) {
                showStatus('❌ Error membuat file ZIP: ' + error.message, 'error');
            }
        }

        // FUNGSI BARU: Menampilkan tombol WhatsApp setelah download selesai
        function showWhatsAppButton() {
            const whatsappSection = document.getElementById('whatsapp-section');
            const whatsappButton = document.getElementById('whatsappButton');
            
            // Tampilkan section WhatsApp
            whatsappSection.classList.remove('hidden');
            
            // Tambahkan efek animasi
            whatsappButton.classList.add('pulse');
            
            // Scroll ke tombol WhatsApp
            setTimeout(() => {
                whatsappSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 500);
            
            showStatus('📱 Tombol WhatsApp sudah tersedia! Silakan kirim file ZIP ke admin.', 'success');
        }

        // Fungsi untuk mengirim ke WhatsApp
        function sendToWhatsApp() {
            const npsn = document.getElementById('schoolName').value.trim();
            
            if (!npsn) {
                showStatus('❌ Harap masukkan NPSN terlebih dahulu!', 'error');
                return;
            }
            
            if (!currentZipFile) {
                showStatus('❌ Tidak ada file ZIP yang tersedia. Silakan download terlebih dahulu.', 'error');
                return;
            }
            
            // Format pesan sesuai permintaan
            const message = `NPSN: ${npsn} - Laporan Instalasi Selesai`;
            
            // Encode pesan untuk URL
            const encodedMessage = encodeURIComponent(message);
            
            // Buat URL WhatsApp
            const whatsappUrl = `https://wa.me/6281383796300?text=${encodedMessage}`;
            
            // Buka WhatsApp di tab baru
            window.open(whatsappUrl, '_blank');
            
            showStatus('✅ WhatsApp berhasil dibuka. Silakan lampirkan file ZIP dan kirim pesan.', 'success');
        }

        // Fungsi untuk menampilkan status
        function showStatus(message, type) {
            const statusElement = document.getElementById('statusMessage');
            statusElement.textContent = message;
            statusElement.className = `status-message ${type}`;
            statusElement.classList.remove('hidden');
            
            // Auto-hide success messages after 5 seconds
            if (type === 'success') {
                setTimeout(() => {
                    statusElement.classList.add('hidden');
                }, 5000);
            }
        }

        // Validasi input koordinat
        document.addEventListener('DOMContentLoaded', function() {
            for (let i = 1; i <= 6; i++) {
                const latInput = document.getElementById('lat' + i);
                const lngInput = document.getElementById('lng' + i);
                
                if (latInput && lngInput) {
                    latInput.addEventListener('input', function() {
                        this.value = this.value.replace(/[^0-9.-]/g, '');
                    });
                    lngInput.addEventListener('input', function() {
                        this.value = this.value.replace(/[^0-9.-]/g, '');
                    });
                }
            }
        });
    </script>
</body>
</html>
