<form method="post" action="{{ $url }}" style="display: inline-block" class="delete-form" id="delete-form">
    @method('DELETE')
    @csrf

    <button style="cursor: pointer;" type="submit" class="btn btn-danger" title="Delete">
        <i class="fa fa-trash-alt" id="delete"></i>
    </button>
</form>
