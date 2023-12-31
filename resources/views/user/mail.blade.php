<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS styles for the email notification */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            margin-top: 0;
        }

        p {
            color: #666666;
            line-height: 1.5;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Job Created</h1>
        <p>Dear User,</p>
        <p>A new job has been created. Please login to your account to view the details.</p>
        <hr>
        <p>Job Title:{{ $job['title'] }}</p><br/>
        <p>Company:{{ $job['company_name'] }}</p><br/>
        <p>Location:{{ $job['location'] }}</p><br/>
        <p>Job Description:{{ $job['description'] }}</p><br/>
        <p>Salary:{{ $job['salary'] }}</p><br/>
        <p>Thank you for using our platform!</p><br/>
        <a href="{{ route('login') }}" class="button">Apply Now</a>
    </div>
</body>
</html>
