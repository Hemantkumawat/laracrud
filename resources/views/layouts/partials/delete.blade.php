<script src="{{ asset('plugins/confirmDelete.js') }}"></script>
<form id="bootBoxDelete"
      method="post">
    @csrf
    @method('DELETE')
    <button type="submit" style="display: none">
        <i class="fa fa-trash"></i>
    </button>
</form>
