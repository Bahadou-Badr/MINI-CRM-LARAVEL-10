<div class="mb-3 mt-3">
    <label for="company_name">Nom de l'entreprise <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="company_name" name="company_name"
        value="{{ old('company_name', $company->company_name ?? null) }}" required>
</div>
<div class="mb-3">
    <label for="address">Adresse <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="address" name="address"
        value="{{ old('address', $company->address ?? null) }}" required>
</div>
