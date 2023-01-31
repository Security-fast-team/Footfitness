{{-- Order Status Name  --}}
<label for="status" class="col-form-label">Order Status Name <span class="text-danger">*</span></label>
<select name="status" class="form-control dialogify-bottom-select" id="order_status_name">
    <option value="" hidden>Select Order Status Name</option>
    @forelse ($minfo as $value)
        <option value="{{ $value->name }}">{{ $value->name }}</option>
    @empty
        <option value="">Please Add Order Status</option>
    @endforelse
</select>
@error('status')
    <span class="text-danger">{{ $message }}</span>
@enderror
