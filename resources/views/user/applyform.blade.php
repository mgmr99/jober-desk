@extends('layouts.master')
@section('content')
    <style>
        h1 {
        font-size: 20px;
        margin-top: 24px;
        margin-bottom: 24px;
        }

        img {
        height: 40px;
        }
    </style>
    <section class="">
        <div class="container">
            <h1>Application Form</h1>
            {{-- {{ dd($job) }} --}}
            <form accept-charset="UTF-8" action="{{ route('user.store.details',['id' => $job_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="exampleInputName">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter your name and surname" required="required">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1" required="required">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address">
                </div>
                <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="New Baneshwor">
                </div>
                <div class="form-group">
                <label for="inputAddress">Contact</label>
                <input type="phone" name="contact" class="form-control" id="inputAddress" placeholder="Enter your contact number">
                </div>
                <div class="form-group mt-3">
                    <label class="mr-4">Upload your Resume:</label>
                    <input type="file" name="resume">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
    <!-- Modal Container -->
    <div id="flash-message-modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-top-right">
            <div class="modal-content">
                <!-- Message content will be inserted here dynamically -->
            </div>
        </div>
    </div>

    <!-- Your scripts and other content here -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check if a message is present in the session
            var message = '{{ session("message") }}';

            if (message) {
                // Update the modal content with the message
                $('#flash-message-modal .modal-content').html('<div class="modal-body">' + message + '</div>');

                // Show the modal
                $('#flash-message-modal').modal('show');
            }
        });
    </script>
</section>
@endsection