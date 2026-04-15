<!<!DOCTYPE html>
<html>
<head>
    <title>Data Diri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #9ad9ff, #4da6ff);
        }

        .card {
            width: 400px;
            padding: 80px 40px 45px 40px;
            border-radius: 30px;
            backdrop-filter: blur(18px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 30px 60px rgba(0,0,0,0.2);
            text-align: center;
            position: relative;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-wrapper {
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 15px;
            border-radius: 50%;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .logo-wrapper img {
            width: 95px;
            height: 95px;
        }

        .subtitle {
            font-size: 15px;
            font-weight: 500;
            color: white;
            margin-bottom: 30px;
            letter-spacing: 0.5px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            top: 14px;
            left: 15px;
            color: #4da6ff;
            font-size: 14px;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border-radius: 14px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        .input-group input:focus,
        .input-group select:focus {
            box-shadow: 0 0 12px rgba(255,255,255,0.7);
        }

        button {
            width: 100%;
            padding: 14px;
            border-radius: 14px;
            border: none;
            background: white;
            color: #4da6ff;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background: #e6f4ff;
            transform: scale(1.04);
        }
    </style>
</head>
<body>

<div class="card">

    <div class="logo-wrapper">
        <img src="{{ asset('images/logo.png') }}">
    </div>

    <div class="subtitle">Silahkan masukan data diri</div>

    <form action="{{ url('/store') }}" method="POST">
    @csrf

        <div class="input-group">
            <i class="fa fa-user"></i>
            <input type="text" name="nama" placeholder="Nama Pengguna" required>
        </div>

        <div class="input-group">
            <i class="fa fa-weight-scale"></i>
            <input type="number" name="berat_badan" placeholder="Berat Badan (kg)" required>
        </div>

        <div class="input-group">
            <i class="fa fa-calendar"></i>
            <input type="number" name="umur" placeholder="Umur" required>
        </div>

        <div class="input-group">
            <i class="fa fa-venus-mars"></i>
            <select name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <button type="submit">Simpan Data</button>

    </form>

</div>

</body>
</html>