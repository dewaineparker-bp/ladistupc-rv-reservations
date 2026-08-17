<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LA District RV Reservations</title>
    <style>
        body{font-family:Arial,sans-serif;margin:0;background:#f3f5f7;color:#17202a}.wrap{max-width:980px;margin:0 auto;padding:48px 22px}.card{background:#fff;border-radius:18px;padding:32px;box-shadow:0 12px 40px rgba(0,0,0,.08)}h1{margin-top:0;font-size:38px}.lead{color:#566573;font-size:18px}.grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}.field{display:flex;flex-direction:column;gap:7px}label{font-weight:700}input,select{font:inherit;padding:13px;border:1px solid #ccd1d1;border-radius:9px}button{margin-top:24px;background:#1f4e79;color:#fff;border:0;border-radius:9px;padding:14px 22px;font-size:17px;font-weight:700;cursor:pointer}.error{background:#fdecea;color:#922b21;padding:12px;border-radius:8px;margin-bottom:18px}@media(max-width:650px){.grid{grid-template-columns:1fr}h1{font-size:30px}}
    </style>
</head>
<body><div class="wrap"><div class="card">
    <h1>RV Reservations</h1>
    <p class="lead">Choose your dates and tell us whether the RV will be occupied or stored. We’ll show you the sites available for that exact period.</p>
    @if(session('error'))<div class="error">{{ session('error') }}</div>@endif
    @if($errors->any())<div class="error">{{ $errors->first() }}</div>@endif
    <form method="get" action="{{ route('rv.availability') }}">
        <div class="grid">
            <div class="field"><label for="arrival_date">Arrival date</label><input type="date" id="arrival_date" name="arrival_date" required></div>
            <div class="field"><label for="departure_date">Departure date</label><input type="date" id="departure_date" name="departure_date" required></div>
            <div class="field"><label for="usage_mode">How will the RV be used?</label><select id="usage_mode" name="usage_mode"><option value="occupied">Occupied — staying in the RV</option><option value="storage">Storage — RV parked, not occupied</option></select></div>
        </div>
        <button type="submit">Show Available Sites</button>
    </form>
</div></div></body></html>
