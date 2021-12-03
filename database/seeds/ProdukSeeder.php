<?php

use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert([
            'nama' => 'ASUS VivoBook 14 A412FA',
            'foto' => 'a412fa.jfif',
            'harga' => 10350000,
            'spesifikasi' => 'Ukuran Layar: 14";Resolusi Layar: 1920 x 1080 pixels;Teknologi Layar: LED;Sistem Operasi: Windows 10 Home;Kecepatan CPU: 3.9GHz;CPU: Intel Core i5;Daya Tahan Baterai: 2.5h;Backlit Keyboard: Tidak;Layar Sentuh: Tidak;Fingerprint Reader: Tidak;Berat: 1.5Kg;Material Bodi: Aluminium;Tipe Penyimpanan: SSD;Penyimpanan: 512GB;Graphic Card: Intel UHD Graphic 620;HDMI: Ya;USB 3.0: Ya;USB Type-C: Ya; Handphone Jack: Ya;VGA: Tidak;Display Port: Tidak;Thunderbolt: Tidak;USB: Ya;Card Reader: Ya;DVI: Tidak;Resolusi Webcam: HD;RAM: 4GB;Tipe RAM: DDR4;Kecepatan RAM: 2400MHz;Garansi: 1 Tahun;Wi-Fi Standard: 802.11a/b/g/n/ac',
            'like' => 30,
            'kategoris_id' => 1,
            'brands_id' => 1
        ]);

        DB::table('produks')->insert([
            'nama' => 'ASUS TUF Gaming FX505DY',
            'foto' => 'fx505dy.jfif',
            'harga' => 12633000,
            'spesifikasi' => 'Ukuran Layar: 15.6";Resolusi Layar: 1920 x 1080 pixels;Teknologi Layar: LED;Sistem Operasi: Windows 10 Pro;Kecepatan CPU: 3.7GHz;CPU: AMD Ryzen;Backlit Keyboard: Ya;Layar Sentuh: Tidak;Fingerprint Reader: Tidak;Berat: 2.2Kg;Material Bodi: Baja;Tipe Penyimpanan: HDD;Penyimpanan: 1000GB;Graphic Card: Radeon RX560X Discrete GPU;HDMI: Ya;USB 3.0: Ya;USB Type-C: Tidak;Handphone Jack: Ya;VGA: Tidak;Display Port: Tidak;Thunderbolt: Tidak;USB: Ya;Card Reader: Tidak;DVI: Tidak;Resolusi Webcam: HD;RAM: 4GB;Tipe RAM: DDR4;Kecepatan RAM: 2666MHz;Warna: Hitam;Garansi: 1 Tahun;Wi-Fi Standard: 802.11 ac',
            'like' => 0,
            'kategoris_id' => 1,
            'brands_id' => 1
        ]);

        DB::table('produks')->insert([
            'nama' => 'ASUS ZenBook 14 UM431DA',
            'foto' => 'um431da.png',
            'harga' => 11400000,
            'spesifikasi' => 'Ukuran Layar: 14";Resolusi Layar: 1920 x 1080 pixels;Teknologi Layar: LED;Sistem Operasi: Windows;Kecepatan CPU: 3.7GHz;CPU: AMD Ryzen;Daya Tahan Baterai: 12h;Backlit Keyboard: Ya;Layar Sentuh: Tidak;Fingerprint Reader: Ya;Berat: 1.39kg;Material Bodi: Serat Karbon;Tipe Penyimpanan: SSD;Penyimpanan: 512GB;Graphic Card: AMD Radeon RX Vega 8;HDMI: Ya;USB 3.0: Ya;USB Type-C: Ya;Headphone Jack: Ya;VGA: Tidak;Thunderbolt: Tidak;USB: Ya;Card Reader: Ya;DVI: Tidak;Display Port: Tidak;Resolusi Webcam: HD;RAM: 8GB;Tipe RAM: DDR4;Kecepatan RAM: 2400MHz;Warna: Biru;Garansi: 2 Tahun;Wi-Fi Standard: 802.11 ac',
            'like' => 0,
            'kategoris_id' => 1,
            'brands_id' => 1
        ]);

        DB::table('produks')->insert([
            'nama' => 'Acer Nitro 5',
            'foto' => 'nitro5.jfif',
            'harga' => 19450000,
            'spesifikasi' => 'Ukuran Layar: 15.6";Resolusi Layar: 1920 x 1080 pixels;Teknologi Layar: LED;Sistem Operasi: Windows 10 Home;Kecepatan CPU: 2.5GHz;CPU: Intel Core i7;Daya Tahan Baterai: 8h;Backlit Keyboard: Tidak;Layar Sentuh: Tidak;Fingerprint Reader: Tidak;Berat: 2.48kg;Material Bodi: Plastik;Tipe Penyimpanan: SSD;Penyimpanan: 1000GB;Graphic Card: NVIDIA;HDMI: Ya;USB 3.0: Ya;USB Type-C: Ya;Headphone Jack: Ya;VGA: Tidak;Thunderbolt: Tidak;USB: Ya;Card Reader: Ya;DVI: Tidak;Display Port: Tidak;Resolusi Webcam: HD;RAM: 8GB;Tipe RAM: DDR4;Kecepatan RAM: 2666MHz;Warna: Hitam;Garansi: 1 Tahun;Wi-Fi Standard: 802.11 ac',
            'like' => 98,
            'kategoris_id' => 1,
            'brands_id' => 2
        ]);

        DB::table('produks')->insert([
            'nama' => 'Acer Aspire One',
            'foto' => 'aspireone.jpg',
            'harga' => 7400000,
            'spesifikasi' => 'Ukuran Layar: 10.1";Resolusi Layar: 1240 x 600 pixels;Teknologi Layar: LED;Sistem Operasi: Windows 7;Kecepatan CPU: 1.6GHz;CPU: Intel Atom;Daya Tahan Baterai: 8h;Backlit Keyboard: Tidak;Layar Sentuh: Tidak;Fingerprint Reader: Tidak;Berat: 1.25kg;Material Bodi: Plastik;Tipe Penyimpanan: SSD;Penyimpanan: 100GB;Graphic Card: AMD;HDMI: Tidak;USB 3.0: Tidak;USB Type-C: Tidak;Headphone Jack: Ya;VGA: Ya;Thunderbolt: Tidak;USB: Ya;Card Reader: Ya;DVI: Tidak;Display Port: Tidak;Resolusi Webcam: HD;RAM: 1GB;Tipe RAM: DDR2;Kecepatan RAM: 553MHz;Garansi: 1 Tahun;Wi-Fi Standard: 802.11 b',
            'like' => 0,
            'kategoris_id' => 1,
            'brands_id' => 2
        ]);

        DB::table('produks')->insert([
            'nama' => 'Acer Aspire R13',
            'foto' => 'aspirer13.jpg',
            'harga' => 8000000,
            'spesifikasi' => 'Ukuran Layar: 13.3";Resolusi Layar: 1920 x 1080 pixels;Teknologi Layar: LED;Sistem Operasi: Windows 8;Kecepatan CPU: 2.1GHz;CPU: Intel Core i5;Daya Tahan Baterai: 8h;Backlit Keyboard: Ya;Layar Sentuh: Ya;Fingerprint Reader: Tidak;Berat: 1.5kg;Material Bodi: Aluminium;Tipe Penyimpanan: SSD;Graphic Card: Intel;HDMI: Ya;USB 3.0: Ya;USB Type-C: Tidak;Headphone Jack: Ya;VGA: Tidak;Thunderbolt: Tidak;USB: Ya;Card Reader: Ya;DVI: Tidak;Display Port: Tidak;Resolusi Webcam: HD;RAM: 8GB;Tipe RAM: DDR3;Garansi: 1 Tahun;Wi-Fi Standard: 802.11 b',
            'like' => 0,
            'kategoris_id' => 1,
            'brands_id' => 2
        ]);

        DB::table('produks')->insert([
            'nama' => 'MSI Modern 14',
            'foto' => 'modern14.jfif',
            'harga' => 12550000,
            'spesifikasi' => 'Ukuran Layar: 14";Resolusi Layar: 1920 x 1080 pixels;Teknologi Layar: IPS;Sistem Operasi: Windows 10 Home;Kecepatan CPU: 4.1GHz;CPU: Intel Core i3;Daya Tahan Baterai: 8h;Backlit Keyboard: Ya;Layar Sentuh: Tidak;Fingerprint Reader: Ya;Berat: 1.3kg;Material Bodi: Aluminium;Tipe Penyimpanan: SSD;Penyimpanan: 256GB;Graphic Card: Intel UHD Graphics 620;HDMI: Ya;USB 3.0: Ya;USB Type-C: Ya;Headphone Jack: Ya;VGA: Tidak;Thunderbolt: Tidak;USB: Ya;Card Reader: Tidak;DVI: Tidak;Display Port: Tidak;Resolusi Webcam: HD;RAM: 4GB;Tipe RAM: DDR4;Kecepatan RAM: 3200MHz;Garansi: 1 Tahun;Wi-Fi Standard: 802.11 ax',
            'like' => 0,
            'kategoris_id' => 1,
            'brands_id' => 3
        ]);

        DB::table('produks')->insert([
            'nama' => 'MSI Katana GF66',
            'foto' => 'katanagf66.jpg',
            'harga' => 15000000,
            'spesifikasi' => 'Ukuran Layar: 15.6";Resolusi Layar: 1920 x 1080 pixels;Teknologi Layar: IPS;Sistem Operasi: Windows 10 Home;Kecepatan CPU: 2.4GHz;CPU: Intel Core i7;Daya Tahan Baterai: 3h;Backlit Keyboard: Ya;Layar Sentuh: Tidak;Fingerprint Reader: Tidak;Berat: 2.25kg;Material Bodi: Plastik;Tipe Penyimpanan: SSD;Penyimpanan: 512GB;Graphic Card: NVIDIA GeForce RTX 3060;HDMI: Ya;USB 3.0: Ya;USB Type-C: Ya;Headphone Jack: Ya;VGA: Tidak;Thunderbolt: Ya;USB: Ya;Card Reader: Tidak;DVI: Ya;Display Port: Ya;Resolusi Webcam: HD;RAM: 4GB;Tipe RAM: GDDR4;Kecepatan RAM: 3200MHz;Warnga: Hitam;Garansi: 2 Tahun;Wi-Fi Standard: 802.11 ax',
            'like' => 151,
            'kategoris_id' => 1,
            'brands_id' => 3
        ]);

        DB::table('produks')->insert([
            'nama' => 'MSI GL62M 7RDX',
            'foto' => '7rdx.jpg',
            'harga' => 13000000,
            'spesifikasi' => 'Ukuran Layar: 15.6";Resolusi Layar: 1920 x 1080 pixels;Teknologi Layar: LED;Sistem Operasi: Windows 10;Kecepatan CPU: 2.8GHz;CPU: Intel Core i7;Daya Tahan Baterai: 8h;Backlit Keyboard: Ya;Layar Sentuh: Tidak;Fingerprint Reader: Tidak;Berat: 2.2kg;Material Bodi: Aluminium;Tipe Penyimpanan: HDD;Penyimpanan: 1000GB;Graphic Card: NVIDIA GeForce GTX 1050;HDMI: Ya;USB 3.0: Ya;USB Type-C: Ya;Headphone Jack: Ya;VGA: Tidak;Thunderbolt: Tidak;USB: Ya;Card Reader: Ya;DVI: Tidak;Display Port: Ya;Resolusi Webcam: HD;RAM: 8GB;Tipe RAM: DDR4;Kecepatan RAM: 2133MHz;Garansi: 2 Tahun;Wi-Fi Standard: 802.11 ac;Warna: Hitam',
            'like' => 0,
            'kategoris_id' => 1,
            'brands_id' => 3
        ]);

        DB::table('produks')->insert([
            'nama' => 'Katar PRO Ultra-Light Gaming Mouse',
            'foto' => 'katarpro.jfif',
            'harga' => 400000,
            'spesifikasi' => 'ULTRA-LIGHT, AMAZINGLY AGILE;Weighing just 69g, the KATAR PRO is extremely light and agile for hours of fast-paced FPS or MOBA gameplay. The compact, symmetric shape makes it great for claw and fingertip grip styles;GAME-WINNING PRECISION;A custom PixArt 12,400 DPI optical sensor offers the precision and high-accuracy tracking you need for victory.;Mouse Warranty Two years;Prog Buttons 6;DPI 12,400 DPI;Sensor PMW3327;Sensor Type Optical;Mouse Backlighting 2 Zone RGB;On Board Memory Yes (no Macro & key remaps);On-board Memory Profiles 1;Mouse Button Durability 30M L/R Click;Connectivity Wired;Grip Type Claw, Fingertip;Weight Tuning No;Weight 69g (w/out cable and accessories);Cable 1.8m Tangle Free Rubber;CUE Software Supported in iCUE;Game Type FPS, MOBA;Report Rate Selectable 1000Hz/500Hz/250Hz/125Hz',
            'like' => 0,
            'kategoris_id' => 2,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR GAMING PBT Double-shot Keycaps Full 104/105-Keyset BLACK',
            'foto' => 'keycaps.jfif',
            'harga' => 670000,
            'spesifikasi' => 'LEGENDS NEVER FADE
            Level up your CORSAIR keyboard with ultra-durable PBT double-shot, backlit compatible keycaps.;BUILT TO LAST;Each keycap is created using ultra-durable PBT with thick double walls and our special two-shot molding process, ensuring greater durability, more stability and legends that always remain clear and legible over time.;DOUBLE-SHOT MOLDED;Our keys are formed in special two-shot mold process to ensure long-lasting durability and performance;ULTRA-DURABLE;Made from dense, shine resistant PBT to reduce key fading;BACKLIGHT ENABLED;Upgrade your keycaps without sacrificing your backlighting;DOUBLE THICK KEYCAP WALLS;Two times thicker than standard keys bringing confidence and stability in every key press;FULL 104/105 KEYS;Upgrade your full keyboard;CORSAIR COMPATIBLE;Works with most* CORSAIR mechanical keyboard and CHERRY switches;STAY STYLISH;CORSAIR Double-shot keycaps are backlit compatible, allowing keycap upgrades without compromising on visual RGB effects.',
            'like' => 0,
            'kategoris_id' => 2,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR K100 RGB Optical-Mechanical Gaming Keyboard - Midnight Gold',
            'foto' => 'k100.png',
            'harga' => 3700000,
            'spesifikasi' => 'Keyboard Warranty 2 Year;Weight 1.25 kg;Lighting RGB;Keyboard Layout NA;Macro Keys 6;USB Polling Rate Up to 8,000Hz with AXON;Keyswitches CORSAIR OPX Optical-Mechanical;USB Pass-Through Port USB 2.0 Type-A;Matrix 110 Keys;Connectivity Wired;Adjustable Height Yes;Additional colored and textured keycaps Black arrow keycaps;Media Controls YN Yes;Keyboard Type Size K100;Keyboard Product Family K100;Keyboard Rollover Full Key (NKRO) with 100% Anti-Ghosting;Form Factor Extended with macro keys;Wired Connectivity 2 x USB 3.0 or 3.1 Type-A;On-Board Memory 8MB;Number Onboard profiles Up to 200 depending on complexity;WIN Lock Dedicated Hotkey;Media Control Dedicated Hotkeys, Volume Roller, iCUE Control Wheel;Palm Rest Magnetic detachable, cushioned leatherette;Keyboard CUE Software Supported in iCUE;Cable Type Braided;Intergated Touchpad 471mm x 167mm x 39mm',
            'like' => 0,
            'kategoris_id' => 2,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR MM300 PRO Premium Spill-Proof Cloth Gaming Mouse Pad -Extended',
            'foto' => 'mm300.jpg',
            'harga' => 440000,
            'spesifikasi' => 'Mat Warranty Two Years;Mat Material Micro-weave Cloth, Spill-proof;Mat Size Extended;930mm x 300mm x 3mm',
            'like' => 0,
            'kategoris_id' => 2,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR PBT DOUBLE-SHOT PRO Keycap Mod Kit - ORIGIN Red',
            'foto' => 'keycapred.jpg',
            'harga' => 400000,
            'spesifikasi' => 'CORSAIR PBT DOUBLE-SHOT PRO;SUPPORTED FOR CORSAIR KEYBOARD;K60 PRO;K60 RGB PRO;K65 RGB MINI;K70 RGB TKL;K100;Keycap Mod Kit gives your keyboard added durability and personalization. Rigid 1.5mm-thick double-shot PBT keycaps include a textured surface for added grip and stability that resists wear, fading, and shine. The full-size keyboard set includes a standard bottom row layout, making it compatible with any CORSAIR mechanical and optical-mechanical keyboard with a standard bottom row, and all other MX keyboards. Multiple striking color options accentuate your desktop aesthetic, while included optional O-ring dampeners soften keystrokes for a quieter and more comfortable experience .',
            'like' => 0,
            'kategoris_id' => 2,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR K70 RGB TKL Mechanical Keyboard - CHERRY MX SPEED',
            'foto' => 'k70.jpg',
            'harga' => 2400000,
            'spesifikasi' => 'Keyboard Warranty 2 Year;Weight 0.9;Lighting RGB;Keyboard Layout NA;USB Polling Rate Up to 8,000Hz with AXON;Keyswitches CHERRY® MX SPEED;Matrix 87 Keys;Connectivity Wired;Adjustable Height Yes;Additional colored and textured keycaps FPS / MOBA;Media Controls YN Yes;Keyboard Type Size K70;Keyboard Product Family K70;Keyboard Rollover Full Key (NKRO) with 100% Anti-Ghosting;Form Factor Tenkeyless;Wired Connectivity USB 3.0 or 3.1 Type-A;On-Board Memory 8MB;Number Onboard profiles Up to 50;WIN Lock Dedicated Hotkey;Media Control Dedicated Hotkeys, Volume Roller;Palm Rest No;Keyboard CUE Software Supported in iCUE;Cable Type Detachable;Keyboard Cable Material Braided',
            'like' => 123,
            'kategoris_id' => 2,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'HS60 HAPTIC Stereo Gaming Headset with Haptic Bass',
            'foto' => 'hs60.jfif',
            'harga' => 1700000,
            'spesifikasi' => 'Audio Product Headset;Audio CUE Software Yes;Surround Sound No;Detachable Microphone Yes;Rechargble Battery No;Headphone Frequency Response 20Hz - 20 kHz;Headphone Battery Life N/A;Headphone Sensitivity 111dB (+/-3dB);Headphone Wireless Range N/A;Impedance 32k Ohms @ 1 kHz;Headphone Type Wired, USB;Headphone Connector USB;Headphone Drivers 50mm;Audio Accessories Yes;Controls No;Audio System Requirements 1.8m;Cable Length 1.8m;Model HS60 HAPTIC;Color Camo;Audio Stereo;Lighting None;Platform PC;Microphone Impedance 2.0k Ohms;Microphone Type Unidirectional noise cancelling;Microphone Frequency Response 100Hz to 10kHz;Microphone Sensitivity -40dB (+/-3dB)',
            'like' => 0,
            'kategoris_id' => 2,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR iCUE H170i ELITE CAPELLIX Liquid CPU Cooler',
            'foto' => 'cooler.jpg',
            'harga' => 3300000,
            'spesifikasi' => 'Cooling Warranty 5 Year;Cold Plate Material Copper;Radiator Material Aluminum;PWM Yes;CORSAIR iCUE Compatibility Yes;Fan Dimensions 140mm x 25mm;Fan Speed 2000 RPM;Weight 1.95;Number of Fans 3;Cooling Socket Support Intel 115x/1200;Intel 2011/2066;AMD AM3/AM2;AMD AM4;AMD sTR4/sTRX4;Lighting RGB;Fan Model ML RGB Series;Noise Level 10 - 37 dBA',
            'like' => 0,
            'kategoris_id' => 2,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'HS60 HAPTIC Stereo Gaming Headset with Haptic Bass',
            'foto' => 'hs60.jfif',
            'harga' => 1700000,
            'spesifikasi' => 'Audio Product Headset;Audio CUE Software Yes;Surround Sound No;Detachable Microphone Yes;Rechargble Battery No;Headphone Frequency Response 20Hz - 20 kHz;Headphone Battery Life N/A;Headphone Sensitivity 111dB (+/-3dB);Headphone Wireless Range N/A;Impedance 32k Ohms @ 1 kHz;Headphone Type Wired, USB;Headphone Connector USB;Headphone Drivers 50mm;Audio Accessories Yes;Controls No;Audio System Requirements 1.8m;Cable Length 1.8m;Model HS60 HAPTIC;Color Camo;Audio Stereo;Lighting None;Platform PC;Microphone Impedance 2.0k Ohms;Microphone Type Unidirectional noise cancelling;Microphone Frequency Response 100Hz to 10kHz;Microphone Sensitivity -40dB (+/-3dB)',
            'like' => 0,
            'kategoris_id' => 2,
            'brands_id' => 4
        ]);


        DB::table('produks')->insert([
            'nama' => 'CORSAIR VENGEANCE RGB RS 16GB DDR4 DRAM 3600MHz CMG16GX4M2D3600C18',
            'foto' => 'CMG16GX4M2D3600C18.jpg',
            'harga' => 1440000,
            'spesifikasi' => 'Fan Included No;Memory Series VENGEANCE RGB RS;Memory Type DDR4;Memory Size 16GB;Tested Latency 18-22-22-42;Tested Voltage 1.35;Tested Speed 3600;Memory Color BLACK;LED Lighting RGB;Single Zone / Multi-Zone Lighting Dynamic Multi-Zone;SPD Latency 15-15-15-36;SPD Speed 2133MHz;SPD Voltage 1.2V;Speed Rating PC4-28800 (3600MHz);Compatibility Intel 300Series,Intel 400 Series,Intel 500 Series,AMD 300 Series,AMD 400 Series,AMD 500 Series;Heat Spreader Anodized Aluminum;Package Memory Format DIMM;Performance Profile XMP 2.0;Package Memory Pin 288',
            'like' => 0,
            'kategoris_id' => 3,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR VENGEANCE RGB RS 16GB DDR4 DRAM 3200MHz CMG16GX4M1E3200C16',
            'foto' => 'CMG16GX4M1E3200C16.jfif',
            'harga' => 1270000,
            'spesifikasi' => 'Fan Included No;Memory Series VENGEANCE RGB RS;Memory Type DDR4;Memory Size 16GB;Tested Latency 16-20-20-38;Tested Voltage 1.35;Tested Speed 3200;LED Lighting RGB;Single Zone / Multi-Zone Lighting Dynamic Multi-Zone;SPD Latency 15-15-15-36;SPD Speed 2133MHz;SPD Voltage 1.2V;Speed Rating PC4-25600 (3200MHz);Compatibility Intel 300Series,Intel 400 Series,Intel 500 Series,AMD 300 Series,AMD 400 Series,AMD 500 Series;Heat Spreader Anodized Aluminum;Package Memory Format DIMM;Performance Profile XMP 2.0;Package Memory Pin 288',
            'like' => 0,
            'kategoris_id' => 3,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR VENGEANCE RGB RT 16GB DDR4 DRAM 4000MHz C18 CMN16GX4M2Z4000C18',
            'foto' => 'CMN16GX4M2Z4000C18.jpg',
            'harga' => 2570000,
            'spesifikasi' => 'Fan Included No;Memory Series VENGEANCE RGB RT;Memory Type DDR4;Memory Size 16GB;Tested Latency 18-22-22-42;Tested Voltage 1.35;Tested Speed 4000;Memory Color BLACK;LED Lighting RGB;Single Zone / Multi-Zone Lighting Dynamic Multi-Zone;SPD Latency 22-22-22-53;SPD Speed 3200MHz;SPD Voltage 1.2V;Speed Rating PC4-32000 (4000MHz);Compatibility Intel 300Series,Intel 400 Series,Intel 500 Series,AMD 300 Series,AMD 400 Series,AMD 500 Series;Heat Spreader Anodized Aluminum;Package Memory Format DIMM;Performance Profile XMP 2.0;Package Memory Pin 288',
            'like' => 0,
            'kategoris_id' => 3,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR MP600 PRO XT 2TB M.2 NVMe PCIe Gen. 4 x4 SSD',
            'foto' => 'mp600.png',
            'harga' => 6500000,
            'spesifikasi' => 'SSD Unformatted Capacity 2TB;SSD Smart Support Yes;Weight 0.066;SSD Interface PCIe Gen 4.0 x4;SSD Max Sequential Read CDM Up to 7,100MB/s;SSD Max Sequential Write CDM Up to 6,800MB/s;Max Random Write QD32 IOMeter Up to 1.2M IOPS;Max Random Read QD32 IOMeter Up to 1M IOPS;Form Factor M.2 2280;Dimensions 80mm x 23mm x 19mm;Application Consumer Client;Weight 0.066;Warranty 5 Year;NAND Technology 3D TLC NAND;Voltage 3.3V, +/- 5%;Endurance 1400TBW;TBW 1400;MTBF 1,600,000 Hours;DEVSLP PS4: <2mW;Encryption AES 256-bit Encryption;Storage Temperature -40°C to +85°C;SSD Operating Temperature 0°C to +70°C;SSD Shock 1500 G;Storage Humidity 93% RH (40° C);Operating Humidity 90% RH (40° C);Vibration 20Hz~80Hz/1.52mm, 80Hz~2000Hz/20G',
            'like' => 0,
            'kategoris_id' => 3,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CV Series CV750 750 Watt 80 Plus Bronze Certified PSU',
            'foto' => 'cv750.png',
            'harga' => 1140000,
            'spesifikasi' => 'Weight 1.9;Adjustable Single/Multi 12V Rail No;ATX Connector 1;ATX12V Version v2.31;Continuous power W 750 Watts;Fan bearing technology Sleeve;Fan size mm 120mm;MTBF hours 100,000 hours;Multi-GPU ready No;Warranty 3 Year;PSU Form Factor ATX;Zero RPM Mode No;EPS12V Connector 2;Floppy Connector 1;Modular No;PCIe Connector 2;SATA Connector 7',
            'like' => 66,
            'kategoris_id' => 3,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR Force Series Gen.4 PCIe MP600 2TB NVMe M.2 SSD',
            'foto' => 'mp600gen4.jfif',
            'harga' => 5760000,
            'spesifikasi' => 'SSD Unformatted Capacity 2TB;SSD Smart Support Yes;Weight 0.034kg;SSD Interface PCIe Gen 4.0 x4;SSD Max Sequential Read CDM Up to 4,950MB/s;SSD Max Sequential Write CDM Up to 4,250MB/s;Max Random Write QD32 IOMeter Up to 600k IOPS;Max Random Read QD32 IOMeter Up to 680k IOPS;Power Consumption active 6.5W Average;Power Consumption Inactive 1.1W;Form Factor M.2 2280;Dimensions 80mm x 23mm x 15mm;Application Consumer Client;Weight 0.034;NAND Technology 3D TLC NAND;Voltage 3.3V, +/- 5%;Endurance 3,600 TBW;TBW 3600;MTBF 1,700,000 Hours;DEVSLP PS4 < 1.65mW;Encryption AES 256-bit Encryption;Storage Temperature -40°C to +85°C;SSD Operating Temperature 0°C to +70°C;SSD Shock 1500 G;Storage Humidity 93% RH (40° C);Operating Humidity 90% RH (40° C);Vibration 20Hz~80Hz/1.52mm, 80Hz~2000Hz/20G',
            'like' => 0,
            'kategoris_id' => 3,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR VENGEANCE® LPX 8GB DDR4 DRAM 3200MHz CMK8GX4M1E3200C16',
            'foto' => 'CMK8GX4M1E3200C16.jpg',
            'harga' => 649000,
            'spesifikasi' => 'Fan Included No;Memory Series VENGEANCE LPX;Memory Type DDR4;Memory Size 8GB Kit (1 x 8GB);Tested Latency 16-20-20-38;Tested Voltage 1.35V;Tested Speed 3200MHz;SPD Latency 15-15-15-36;SPD Voltage 1.2V;Speed Rating PC4-25600 (3200MHz);Compatibility Intel 200 Series,Intel 300 Series,Intel 400 Series,Intel 500 Series,Intel X299,AMD 300 Series,AMD 400 Series,AMD 500 Series,AMD X570;Heat Spreader Anodized Aluminum;Package Memory Format DIMM;Performance Profile XMP 2.0;Package Memory Pin 288',
            'like' => 0,
            'kategoris_id' => 3,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR DOMINATOR PLATINUM RGB 32GB 2x16GB DDR4 CMT32GX4M2D3600C18',
            'foto' => 'CMT32GX4M2D3600C18.jfif',
            'harga' => 4120000,
            'spesifikasi' => "Brand CORSAIR;Series Dominator Platinum RGB;Model CMT32GX4M2D3600C18;Details;Capacity 32GB (2 x 16GB);Type 288-Pin DDR4 SDRAM;Speed DDR4 3600 (PC4 28800);CAS Latency 18;Voltage 1.35V;Heat Spreader Anodized Aluminum;Features Iconic and Refined High-Performance RGB Memory;Iconic CORSAIR DOMINATOR PLATINUM design perfectly complements the world's best PCs, for unmistakable high-end system builds.;High Speed and Tight Timings;Hand-sorted, tightly-screened memory chips ensure high-frequency performance and tight response times, with overclocking headroom to spare.;Premium Craftsmanship;A combination of precision die-casting and anodization creates premium memory that's built to last.;12 Ultra-Bright RGB LEDs Per Module;Illuminate your PC with spectacular customizable lighting from 12 individually addressable RGB LEDs.;Unique Dual-Channel DHX Cooling Technology;A heatspreader embedded directly into the PCB pulls heat away from the modules, allowing DOMINATOR PLATINUM RGB to stay cool even under extreme stress.;High Speed and Tight Timings;Hand-sorted tightly-screened memory chips ensure high frequency performance and tight response times, with overclocking headroom to spare.;Custom High-Performance PCB;Guarantees signal quality and stability for superior overclocking.;Intelligent Control, Unlimited Possibilities;CORSAIR iCUE software brings your system to life with dynamic RGB lighting control synchronized across all your iCUE compatible products, and keeps you informed with real-time temperature and frequency readings.;Create and Customize;Choose from dozens of stunning pre-set lighting profiles, or create your own with virtually limitless lighting patterns and effects in CORSAIR iCUE software.;Wide Compatibility;Optimized for the latest Intel and AMD DDR4 motherboards.;Intel XMP 2.0 Support;Simple one-setting installation and setup.;Recommend Use AMD 400 Series / AMD X570 / Intel Z370 / Intel Z390;LED",
            'like' => 0,
            'kategoris_id' => 3,
            'brands_id' => 4
        ]);

        DB::table('produks')->insert([
            'nama' => 'CORSAIR VENGEANCE LPX 16GB 2x8GB DDR4 DRAM C16 CMK16GX4M2E3200C16',
            'foto' => 'CMK16GX4M2E3200C16.jpg',
            'harga' => 1230000,
            'spesifikasi' => 'Fan Included No;Memory Series VENGEANCE LPX;Memory Type DDR4;Memory Size 16GB Kit (2 x 8GB);Tested Latency 16-20-20-38;Tested Voltage 1.35V;Tested Speed 3200MHz;Speed Rating PC4-25600 (3200MHz);Compatibility Intel 300 Series,Intel 400 Series,Intel 500 Series,Intel 400 Series,Intel 500 Series,Intel X299,AMD 300 Series,AMD 400 Series,AMD 500 Series,AMD X570;Heat Spreader Anodized Aluminum;Package Memory Format DIMM;Performance Profile XMP 2.0;Package Memory Pin 288',
            'like' => 0,
            'kategoris_id' => 3,
            'brands_id' => 4
        ]);
    }
}
