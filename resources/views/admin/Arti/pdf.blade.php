@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="pdf-management">
                <h2>Add New PDF</h2>
                <form id="pdfForm" action="{{ route('admin.arti.pdf.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="pdf_name">PDF Name:</label>
                        <input type="text" id="pdf_name" name="pdf_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail:</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="pdf_file">PDF File:</label>
                        <input type="file" id="pdf_file" name="pdf_file" class="form-control" accept="application/pdf"
                            required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="action-button add">Add PDF</button>
                    </div>
                </form>
            </section>
            <section class="pdf-list">
                <h2>PDF List</h2>
                <table class="audio-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Pdf Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pdfs as $pdf)
                            <tr>
                                <td>{{ $pdf->id }}</td>
                                <td><img src="{{ Storage::url($pdf->thumbnail_path) }}" alt="{{ $pdf->pdf_name }}"
                                        class="audio-thumbnail"></td>
                                <td>{{ $pdf->pdf_name }}</td>
                                <td class="action-buttons">
                                    
                                    <form action="{{ route('admin.arti.pdf.destroy', $pdf->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button delete">Delete</button>
                                    </form>
                                    <a href="{{ Storage::url($pdf->pdf_path) }}" class="action-button view"
                                        target="_blank">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>

  <script>
    document.getElementById('pdfForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log("Server Response:", data); // Debug ke liye console me dekhein

        if (data.success) {
            const pdfList = document.querySelector('.audio-table tbody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td>${data.pdf.id}</td>
                <td><img src="${data.pdf.thumbnail_path}" alt="${data.pdf.pdf_name}" class="audio-thumbnail"></td>
                <td>${data.pdf.pdf_name}</td>
                <td class="action-buttons">
                    <form action="/admin/arti/pdf/${data.pdf.id}" method="POST" onsubmit="return confirm('Are you sure?');">
                        <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="action-button delete">Delete</button>
                    </form>
                    <a href="${data.pdf.pdf_path}" class="action-button view" target="_blank">View</a>
                </td>
            `;

            pdfList.appendChild(newRow); // ✅ New PDF ko list me add karein

            // Form clear karein
            document.getElementById('pdfForm').reset();
        } else {
            alert(data.message || 'Failed to add PDF.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Something went wrong.');
    });
});

  </script>
@endsection
