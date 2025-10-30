@if(session('success'))
    <div class="alert alert-success">
        <span class="alert-icon">✓</span>
        <span class="alert-message">{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <span class="alert-icon">✕</span>
        <span class="alert-message">{{ session('error') }}</span>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <span class="alert-icon">⚠</span>
        <div class="alert-message">
            <strong>Ops! Há alguns erros:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
