<div class="card h-100" style="border: none; border-left: 5px solid var(--bs-primary); border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); transition: transform 0.2s ease;">
    <div class="card-body" style="padding: 24px;">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h6 class="text-uppercase mb-2" style="color: #6c757d; font-size: 13px; font-weight: 600; letter-spacing: 0.5px;">
                    {{ $label }}
                </h6>
                <h2 class="mb-0" style="color: var(--bs-dark); font-weight: 700; font-size: 32px;">
                    {{ $value }}
                </h2>
            </div>
            @if ($icon ?? false)
                <div style="font-size: 2.5rem; color: rgba(13, 110, 253, 0.15);">
                    {!! $icon !!}
                </div>
            @endif
        </div>
    </div>
</div>
