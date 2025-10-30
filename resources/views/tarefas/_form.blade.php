<div class="form-group">
    <label for="titulo" class="form-label">Título <span class="required">*</span></label>
    <input 
        type="text" 
        name="titulo" 
        id="titulo" 
        class="form-control @error('titulo') is-invalid @enderror"
        value="{{ old('titulo', $tarefa->titulo ?? '') }}"
        placeholder="Digite o título da tarefa"
        required
        maxlength="255"
    >
    @error('titulo')
        <span class="error-message">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea 
        name="descricao" 
        id="descricao" 
        class="form-control @error('descricao') is-invalid @enderror"
        rows="4"
        placeholder="Digite uma descrição para a tarefa (opcional)"
    >{{ old('descricao', $tarefa->descricao ?? '') }}</textarea>
    @error('descricao')
        <span class="error-message">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="status" class="form-label">Status <span class="required">*</span></label>
    <select 
        name="status" 
        id="status" 
        class="form-control @error('status') is-invalid @enderror"
        required
    >
        @foreach($statusOptions as $statusOption)
            <option 
                value="{{ $statusOption->value }}"
                {{ old('status', $tarefa->status ?? \App\Enums\StatusTarefa::PENDENTE) == $statusOption ? 'selected' : '' }}
            >
                {{ $statusOption->label() }}
            </option>
        @endforeach
    </select>
    @error('status')
        <span class="error-message">{{ $message }}</span>
    @enderror
</div>
