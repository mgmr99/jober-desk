@extends('layouts.master')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
    }
    .formbold-main-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px;
    }
  
    .formbold-form-wrapper {
      margin: 0 auto;
      max-width: 570px;
      width: 100%;
      background: white;
      padding: 40px;
    }
  
    .formbold-img {
      display: block;
      margin: 0 auto 40px;
    }
  
    .formbold-form-input {
      width: 100%;
      padding: 13px 22px;
      border-radius: 5px;
      border: 1px solid #dde3ec;
      background: #ffffff;
      font-weight: 500;
      font-size: 16px;
      color: #536387;
      outline: none;
      resize: none;
    }
    .formbold-form-input:focus {
      border-color: #6a64f1;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
    .formbold-form-label {
      color: #07074d;
      font-weight: 500;
      font-size: 14px;
      line-height: 24px;
      display: block;
      margin-bottom: 20px;
    }
    .formbold-form-label span {
      color: #536387;
      font-size: 12px;
      line-height: 18px;
      display: inline-block;
    }
  
    .formbold-mb-3 {
      margin-bottom: 15px;
    }
    .formbold-mb-6 {
      margin-bottom: 30px;
    }
    .formbold-radio-flex {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .formbold-radio-label {
      font-size: 14px;
      line-height: 24px;
      color: #07074d;
      position: relative;
      padding-left: 25px;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .formbold-input-radio {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }
    .formbold-radio-checkmark {
      position: absolute;
      top: -1px;
      left: 0;
      height: 18px;
      width: 18px;
      background-color: #ffffff;
      border: 1px solid #dde3ec;
      border-radius: 50%;
    }
    .formbold-radio-label
      .formbold-input-radio:checked
      ~ .formbold-radio-checkmark {
      background-color: #6a64f1;
    }
    .formbold-radio-checkmark:after {
      content: '';
      position: absolute;
      display: none;
    }
  
    .formbold-radio-label
      .formbold-input-radio:checked
      ~ .formbold-radio-checkmark:after {
      display: block;
    }
  
    .formbold-radio-label .formbold-radio-checkmark:after {
      top: 50%;
      left: 50%;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #ffffff;
      transform: translate(-50%, -50%);
    }
  
    .formbold-btn {
      text-align: center;
      width: 100%;
      font-size: 16px;
      border-radius: 5px;
      padding: 14px 25px;
      border: none;
      font-weight: 500;
      background-color: #6a64f1;
      color: white;
      cursor: pointer;
      margin-top: 25px;
    }
    .formbold-btn:hover {
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
  </style>

<div class="formbold-main-wrapper">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">
           {{-- <img src=""> --}}
           <h5>Report a problem</h5>
      <form action="{{ route('user.storeReport') }}" method="POST">
        @csrf
        <div class="formbold-mb-3">
          <label for="message" class="formbold-form-label">
            What should we change in order to live up to your expectations?
          </label>
          <textarea
            rows="6"
            name="problem"
            id="message"
            class="formbold-form-input"
          ></textarea>
        </div>
        <button class="formbold-btn" type="submit">Send Feedback</button>
      </form>
    </div>
  </div>


@endsection