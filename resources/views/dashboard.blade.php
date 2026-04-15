<!DOCTYPE html>
<html>

<head>

<title>Dashboard Monitoring</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background: linear-gradient(135deg,#9ad9ff,#4da6ff);
    min-height:100vh;
    padding:30px;
    color:white;
    display:flex;
    justify-content:center;
}

.container{
    width:100%;
    max-width:1050px;
}

/* HEADER */

.header{
    background:rgba(255,255,255,0.2);
    padding:14px;
    border-radius:12px;
    text-align:center;
    margin-bottom:22px;
    font-weight:600;
    font-size:18px;
}

/* CARD GRID */

.cards{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-bottom:30px;
}

/* CARD */

.card{
background:rgba(255,255,255,0.25);
padding:28px 20px;
border-radius:22px;
text-align:center;
box-shadow:0 10px 30px rgba(0,0,0,0.15);
min-height:140px;
display:flex;
flex-direction:column;
justify-content:center;
}

/* SUB JUDUL + EMOJI */

.card h3{
font-size:17px;
margin-bottom:12px;
font-weight:600;
line-height:1.3;
}

/* NILAI */

.value{
font-size:30px;
font-weight:600;
margin-top:8px;
}

/* CHART */

.chart-box{
    background:rgba(255,255,255,0.25);
    padding:20px;
    border-radius:20px;
    margin-top:10px;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
    max-width:700px;
    margin-left:auto;
    margin-right:auto;
}

.chart-box h3{
    margin-bottom:12px;
    font-size:18px;
    font-weight:600;
}

canvas{
    background:white;
    border-radius:12px;
    padding:10px;
}

/* FINISH SESSION */

.finish-box{
    width:100%;
    max-width:380px; /* DIPERKECIL lagi */
    margin:25px auto 0 auto;
    padding:30px 20px;
    border-radius:18px;
    background: linear-gradient(135deg,#00c853,#00e676);
    text-align:center;
    color:white;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

.finish-box h2{
    font-size:22px;
    margin-bottom:20px;
}

/* BUTTON */

.finish-box .btn-end{
    background:white;
    color:#ff9800; /* ORANYE MUDA */
    padding:10px 22px;
    border-radius:10px;
    font-size:14px;
    font-weight:600;
    border:none;
    cursor:pointer;
}

.finish-box .btn-end:hover{
    transform:scale(1.05);
    background:#fff3e0;
}


/* ===== GRID DASHBOARD ===== */

.main-grid{
display:grid;
grid-template-columns:1.2fr 3fr;
gap:20px;
margin-top:20px;
}

.left-panel{
display:flex;
flex-direction:column;
gap:20px;
}

.right-panel{
display:flex;
flex-direction:column;
gap:20px;
}

.user-box{
background:rgba(255,255,255,0.25);
padding:20px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,0.15);
}

.user-box p{
margin:6px 0;
font-size:14px;
}

.history-box{
background:rgba(255,255,255,0.25);
padding:20px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,0.15);
max-height:300px;
overflow-y:auto;
}

.history-box table{
width:100%;
border-collapse:collapse;
background:white;
color:black;
border-radius:10px;
overflow:hidden;
}

.history-box th,
.history-box td{
padding:8px;
border-bottom:1px solid #eee;
text-align:center;
}

.history-box th{
background:#4da6ff;
color:white;
}

.cards{
display:grid;
grid-template-columns:repeat(4, minmax(180px,1fr));
gap:25px;
}

.chart-box{
width:100%;
}

</style>

</head>

<body>

   <div class="container">

    <div class="header" id="statusHeader">
        ⏳ Menunggu tombol START pada alat
    </div>

<div class="main-grid">

<!-- LEFT PANEL -->
<div class="left-panel">

<div class="user-box">

<h3>👤 Informasi Pengguna</h3>

<p><b>Session ID :</b> {{ $data->id }}</p>
<p><b>Nama :</b> {{ $data->nama }}</p>
<p><b>Berat Badan :</b> {{ $data->berat_badan }} kg</p>
<p><b>Umur :</b> {{ $data->umur }} tahun</p>
<p><b>Jenis Kelamin :</b> {{ $data->jenis_kelamin }}</p>

</div>

<div class="history-box">

<h3>📊 History Olahraga</h3>

<table>

<thead>
<tr>
<th>Session</th>
<th>Aktivitas</th>
<th>Durasi</th>
<th>Kalori</th>
<th>Heart Rate</th>
</tr>
</thead>

<tbody>

@foreach($history as $h)

<tr>
<td>{{ $h->id }}</td>
<td>{{ $h->jenis_aktivitas }}</td>
<td>{{ $h->durasi }}</td>
<td>{{ $h->kalori_terbakar }}</td>
<td>{{ $h->denyut_jantung }}</td>
</tr>

@endforeach

</tbody>

</table>

</div>

</div>


<!-- RIGHT PANEL -->

<div class="right-panel">

<div class="cards">

<div class="card">
<h3>🏃 Detected Activity</h3>
<div class="value" id="activity">Waiting</div>
</div>

<div class="card">
<h3>🔥 Calories Burned</h3>
<div class="value">
<span id="calories">0</span> kcal
</div>
</div>

<div class="card">
<h3>❤️ Heart Rate</h3>
<div class="value">
<span id="heartRate">0</span> bpm
</div>
</div>

<div class="card">
<h3>⏱ Duration</h3>
<div class="value" id="duration">00:00</div>
</div>

</div>


<div class="chart-box">

<h3>📈 Heart Rate Chart</h3>

<canvas id="hrChart"></canvas>

</div>


<div id="finishSection" style="display:none" class="finish-box">

    <h2>🎉 Sesi Selesai!</h2>

    <button class="btn-end" onclick="finishWorkout()">
        🏁 Sesi Olahraga Selesai
    </button>

</div>

</div>

</div>

<script>

let hrData=[]
let labels=[]

const ctx=document.getElementById('hrChart').getContext('2d')

const chart=new Chart(ctx,{
    type:'line',
    data:{
        labels:labels,
        datasets:[{
            label:'BPM',
            data:hrData,
            borderColor:'red',
            backgroundColor:'rgba(255,0,0,0.2)',
            tension:0.4
        }]
    },
    options:{
        responsive:true,
        scales:{
            y:{
                min:60,
                max:200
            }
        }
    }
})

function fetchSession(){

    fetch('/api/session/{{ $data->id }}')
    .then(res=>res.json())
    .then(data=>{

        document.getElementById('activity').innerText=data.jenis_aktivitas ?? "Waiting"
        document.getElementById('calories').innerText=data.kalori_terbakar ?? 0
        document.getElementById('heartRate').innerText=data.denyut_jantung ?? 0
        document.getElementById('duration').innerText=data.durasi ?? "00:00"

        if(data.status=="waiting"){
            document.getElementById('statusHeader').innerText="⏳ Menunggu tombol START pada alat"
        }

        if(data.status=="running"){
            document.getElementById('statusHeader').innerText="🏃‍♂️ Sesi sedang berjalan"

            if(data.denyut_jantung){

                hrData.push(data.denyut_jantung)

                labels.push(labels.length+1)

                chart.update()

            }

        }

        if(data.status=="finished"){

            document.getElementById('statusHeader').innerText="✅ Sesi selesai"

            document.getElementById('finishSection').style.display="block"

            document.getElementById('totalKalori').innerText=data.kalori_terbakar ?? 0

            document.getElementById('totalDurasi').innerText=data.durasi ?? "00:00"

        }

    })

}

setInterval(fetchSession,2000)

function restartSession(){

    fetch('/api/restart-session/{{ $data->id }}',{
    method:'POST',
    headers:{
    'Content-Type':'application/json'
}
    })
    .then(res=>res.json())
    .then(data=>{

            document.getElementById("activity").innerText = "Waiting";
            document.getElementById("calories").innerText = "0";
            document.getElementById("heartRate").innerText = "0";
            document.getElementById("duration").innerText = "00:00";

            hrData = [];
            labels = [];
            chart.data.labels = [];
            chart.data.datasets[0].data = [];
            chart.update();

            document.getElementById("finishSection").style.display="none";

            document.getElementById("statusHeader").innerText="⏳ Menunggu tombol START pada alat";

    });

}

function finishWorkout(){

    window.location.href="/"

}

</script>

</body>
</html>