@extends('layouts.master')

@section('content')
<section class="profile-detail">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="basic-information">
                    <div class="col-md-3 col-sm-3">
                        <img src="{{ asset('assets/images/' . $job->logo) }}" class="img-responsive" alt="Logo" height="100px" width="100px" />
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="profile-content">
                                <h2>{{ $job->company_name }}<span>{{ $job->title }}</span></h2>
                                {{-- <p>Now Hiring</p> --}}
                                <ul class="information">    
                                    <li><span>Address:</span>{{ $job->address }}</li>
                                    <li><span>Website:</span>{{ $job->company_name }}.com</li>
                                    <li><span>Experience:</span>{{ $job->experience }}years</li>
                                    <li><span>Salary: Nrs.</span>{{ $job->salary}}</li>
                                    <li><span>Deadline:</span>{{ $job->deadline}}</li>
                                    
                                    @if (session('applied'))
                                        <a href="#" type="button" class="btn brows-btn" style="background: rgb(124, 87, 87);">{{ session('applied') }} </a>
                                        @else
                                        <a href="{{route('user.fill.details', ['id' => $job->id])}}" type="submit" class="btn brows-btn">Apply</a>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    <ul class="social">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i>Facebook</a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus"></i>Google Plus</a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i>Twitter</a></li>
                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i>Linked In</a></li>
                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i>Instagram</a></li>
                    </ul>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Description
                        </div>
                                            <!-- /.panel-heading -->
                        <div class="panel-body">
                        <p>{{ $job->description }}</p>	
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
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