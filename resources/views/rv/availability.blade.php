<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Available RV Sites</title>
<style>body{font-family:Arial,sans-serif;background:#f3f5f7;margin:0;color:#17202a}.wrap{max-width:1050px;margin:auto;padding:40px 22px}.summary,.site{background:#fff;border-radius:14px;padding:20px;margin-bottom:16px;box-shadow:0 7px 24px rgba(0,0,0,.06)}.sites{display:grid;grid-template-columns:repeat(auto-fill,minmax(190px,1fr));gap:14px}.site{margin:0}.site h3{margin:0 0 8px}.muted{color:#68737d}a{color:#1f4e79}</style></head><body><div class="wrap">
<p><a href="{{ route('rv.home') }}">← Change dates</a></p><div class="summary"><h1>Available Sites</h1><p>{{ $validated['arrival_date'] }} to {{ $validated['departure_date'] }} · {{ ucfirst($validated['usage_mode']) }}</p></div>
<div class="sites">@forelse($sites as $site)<div class="site"><h3>Site {{ $site->site_number }}</h3><div class="muted">{{ $site->electric_service ?: 'Service details coming soon' }}</div></div>@empty<div class="site"><h3>No available sites</h3><div class="muted">Try different dates.</div></div>@endforelse</div>
</div></body></html>
