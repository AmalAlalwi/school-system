<div class="card-body">
    <div class="form-group">

    <x-form.input name="name" type="text" label="Name" :value="$classroom->name ?? ''" placeholder="Enter name" />
    </div>
    <x-form.select name="status" label="Select Classroom Status" 
    :options="['active'=>'Active','inactive'=>'Inactive']" :value="$classroom->status ?? ''" placeholder="Select status"
    :selected="$classroom->status ?? ''"
    />

</div>