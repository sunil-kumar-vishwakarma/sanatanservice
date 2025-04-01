 @extends('admin.layout')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <link rel="stylesheet" href="{{ asset('css\Astrologer\skills.css') }}">
    <div class="container">
        <main class="main-content">

            <section class="skill-list">
                
            <table id="horoscopeTable" class="skill-table table-auto min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">NAME</th>
                        <th class="border px-4 py-2">IMAGE</th>
                        <th class="border px-4 py-2">STATUS</th>
                        <th class="border px-4 py-2">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 0; @endphp
                    @foreach ($signs as $horoScope)
                        <tr>
                            <td class="border px-4 py-2">{{ ($page - 1) * 15 + ++$no }}</td>
                            <td class="border px-4 py-2">{{ $horoScope['name'] }}</td>
                            <td class="border px-4 py-2 text-center">
                                <img class="h-12 w-12 rounded-full mx-auto" src="{{ asset('storage/' . $horoScope['image']) }}"
                                    onerror="this.onerror=null;this.src='/build/assets/images/default.jpg';" alt="Astrologer" />
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <input class="form-check-input toggle-status" type="checkbox"
                                    data-id="{{ $horoScope['id'] }}" {{ $horoScope['isActive'] ? 'checked' : '' }}>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded"
                                        onclick="editbtn({{ $horoScope['id'] }}, '{{ $horoScope['name'] }}', '{{ $horoScope['image'] }}')">
                                    Edit
                                </button> -->
                                <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded"
                                    onclick="editbtn({{ $horoScope['id'] }}, '{{ $horoScope['name'] }}', '{{ $horoScope['image'] }}')"
                                    data-tw-toggle="modal" data-tw-target="#edit-modal">
                                    Edit
                                </button> -->
                                <a href="#" class="btn btn-info btn-sm edit-button" data-id="{{ $horoScope['id'] }}" data-name="{{ $horoScope['name'] }}" data-name="{{ $horoScope['image'] }}">Update</a></td>
                   
                                <!-- <a href="#myModal" data-toggle="modal" id="edit-modal" data-target="#edit-modal">Edit 1</a> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

           
       
   

   

        <!-- <div id="add-gift" class="modal fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="modal-dialog bg-white rounded-lg shadow-lg w-96">
                <div class="modal-content p-5">
                    <div class="modal-header flex justify-between items-center border-b pb-2">
                        <h2 class="text-lg font-semibold">Add Horoscope</h2>
                        <button class="text-gray-500 hover:text-gray-700" onclick="closeModal('add-gift')">&times;</button>
                    </div>
                    <form id="add-data" method="POST" enctype="multipart/form-data" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input mt-1 block w-full border rounded-md p-2" placeholder="Enter Name" required>
                            <div class="text-red-500 text-sm mt-1 hidden" id="name-error"></div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" class="mt-1 block w-full border rounded-md p-2" name="image" id="image" accept="image/*" onchange="previewImage()">
                            <img id="thumb" class="mt-2 hidden w-32 h-32 object-cover rounded-md" alt="Preview" />
                            <div class="text-red-500 text-sm mt-1 hidden" id="image-error"></div>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2" onclick="closeModal('add-gift')">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-md">Add Horoscope</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->


    <!-- <div id="edit-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Edit HororScope Sign</h2>
                </div>
                <form action="{{ route('editHororScopeSignApi') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="input" class="p-5">
                        <div class="preview">
                            <div class="mt-3">
                                <div class="sm:grid grid-cols gap-2 py-4">
                                    <div class="input">
                                        <div>
                                            <input type="hidden" id="filed_id" name="filed_id">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" id="id" class="form-control"
                                                placeholder="Name" required onkeypress="return Validate(event);" required>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="intro-y col-span-12">
                                            <div>
                                                <img id="thumbs" width="150px" alt="signImage"
                                                    onerror="this.style.display='none';" />
                                                <input type="file" class="mt-2" name="image"
                                                    onchange="previews()" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5"><button class="btn btn-primary shadow-md mr-2">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <!-- Edit Horoscope Modal -->

<!-- <div id="edit-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Edit Horoscope Sign</h2>
                <button class="close" onclick="closeModal()">×</button>
            </div>
            <form action="{{ route('editHororScopeSignApi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="input" class="p-5">
                    <div class="preview">
                        <div class="mt-3">
                            <div class="sm:grid grid-cols gap-2 py-4">
                                <div class="input">
                                    <input type="hidden" id="filed_id" name="filed_id">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" required>
                                </div>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="intro-y col-span-12">
                                        <img id="thumbs" width="150px" alt="Sign Image" style="display:none;" />
                                        <input type="file" class="mt-2" name="image" id="imageInput" 
                                            onchange="previews()" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary shadow-md mr-2">Save</button>
                            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->


    <!-- <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process
                            cannot be undone.</div>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button class="btn btn-danger w-24">@method('DELETE')Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="verified" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <div class="text-3xl mt-5">Are You Sure?</div>
                        <div class="text-slate-500 mt-2" id="active">You want Active!</div>
                    </div>
                    <form action="{{ route('horoScopeStatusApi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="status_id" name="status_id">
                        <div class="px-5 pb-8 text-center"><button class="btn btn-primary mr-3" id="btnActive">Yes,
                                Active it!
                            </button><a type="button" data-tw-dismiss="modal" class="btn btn-secondary w-24"
                                onclick="location.reload();">Cancel</a>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div> -->

    
    </section>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Edit HororScope Sign</h2>
                </div>
                <form action="{{ route('editHororScopeSignApi') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="input" class="p-5">
                        <div class="preview">
                            <div class="mt-3">
                                <div class="sm:grid grid-cols gap-2 py-4">
                                    <div class="input">
                                        <div>
                                            <input type="hidden" id="filed_id" name="filed_id">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Name" required onkeypress="return Validate(event);" required>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="intro-y col-span-12">
                                            <div>
                                                <img id="thumbs" width="150px" alt="signImage"
                                                    onerror="this.style.display='none';" />
                                                <input type="file" class="mt-2" name="image"
                                                    onchange="previews()" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5"><button class="btn btn-primary shadow-md mr-2">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </main>
    </div>
    <script>
    $(document).ready(function () {
        $('#horoscopeTable').DataTable({
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
            info: true
        });
    });
</script>
    

    <!-- END: Delete Confirmation Modal -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">

$(document).on('click', '.edit-button', function () {
        var categoryId = $(this).data('id');
        var categoryName = $(this).data('name');

        $('#filed_id').val(categoryId);
        $('#name').val(categoryName);

        // $('#categoryForm').attr('action', '{{ route("editHororScopeSignApi") }}');
        $('#edit-modal').modal('show');
    });

    function previewImage() {
        const file = document.getElementById('image').files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('thumb').src = e.target.result;
                document.getElementById('thumb').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>


    <script type="text/javascript">
       
   

        function editHoroScope($id, $name, $isActive) {
            var id = $id;
            $fid = id;
            var active = $isActive ? 'Inactive' : 'Active';
            document.getElementById('active').innerHTML = "You want to " + active;
            document.getElementById('btnActive').innerHTML = "Yes, " +
                active + " it";
            $('#status_id').val($fid);
            $('#id').val($name);
        }

        function preview() {
            document.getElementById("thumb").style.display = "block";
            thumb.src = URL.createObjectURL(event.target.files[0]);
            jQuery(".print-image-error-msg").find("ul").html('');
        }

        function previews() {
            document.getElementById("thumbs").style.display = "block";
            thumbs.src = URL.createObjectURL(event.target.files[0]);
        }

        function Validate(event) {
            var regex = new RegExp("^[0-9-!@#$%&<>*?]");
            var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
            if (regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        jQuery("#add-data").submit(function(e) {
            e.preventDefault();
            jQuery.ajax({
                type: 'POST',
                url: "{{ route('addHororScopeSignApi') }}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (jQuery.isEmptyObject(data.error)) {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        location.reload();
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg(msg) {
            jQuery(".print-name-error-msg").find("ul").html('');
            jQuery(".print-image-error-msg").find("ul").html('');
            jQuery.each(msg, function(key, value) {
                if (key == 'name') {
                    jQuery(".print-name-error-msg").css('display', 'block');
                    jQuery(".print-name-error-msg").find("ul").append('<li>' + value + '</li>');
                }
                if (key == 'image') {
                    jQuery(".print-image-error-msg").css('display', 'block');
                    jQuery(".print-image-error-msg").find("ul").append('<li>' + value + '</li>');
                }

            });
        }
    </script>
    
    
    @endsection
