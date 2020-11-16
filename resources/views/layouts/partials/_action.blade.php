<a href="{{ $show_url }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
<a href="{{ $edit_url }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
<a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"
    onclick="
        return confirm('Are you sure?') ?
        document.getElementById('delete-form-{{$model->id}}').submit() :
        ''
    "
></i></a>
<form id="delete-form-{{$model->id}}" action="{{ $delete_url }}" method="POST" style="display: none;">
    @csrf @method('DELETE')
</form>
