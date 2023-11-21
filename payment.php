<style>
    .success-icon {
        color: #4CAF50;
        font-size: 60px;
        margin-bottom: 20px;
    }

    .danger-icon {
        color: red;
        font-size: 60px;
        margin-bottom: 20px;
    }
    p {
        color: #666;
        font-size: 18px;
        margin-top: 10px;
    }

    .transaction-details {
        text-align: left;
        margin-top: 20px;
    }

    .return-link {
        color: #007BFF;
        text-decoration: none;
        font-weight: bold;
        display: inline-block;
        margin-top: 20px;
    }

    .return-link:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET["status"]) && $_GET["status"] == "success")
            echo '<div class="success-icon">&#10004;</div>
                    <h1>Payment Successful</h1>
                    <p>Your payment has been successfully processed. Below are the details of your transaction:</p>
            
                    <div class="transaction-details"  style="margin-bottom:50px">
                        <h2>Transaction Details</h2>
                        <p><strong>Transaction ID:</strong> ABC123456</p>
                        <p><strong>Date:</strong> November 20, 2023</p>
                        <p><strong>Amount:</strong> $50.00</p>
                        <p><strong>Payment Method:</strong> Credit Card ending in ****1234</p>
                    </div>';
        else
            echo '<div class="danger-icon">&#10060;</div>
                    <h1>Payment Failed</h1>
                    <p>Your payment has been successfully processed. Below are the details of your transaction:</p>
            
                    <div class="transaction-details"  style="margin-bottom:50px">
                    <h2>Transaction Details</h2>
                    <p><strong>Transaction ID:</strong> ABC123456</p>
                    <p><strong>Date:</strong> November 20, 2023</p>
                    <p><strong>Amount:</strong> $50.00</p>
                    <p><strong>Payment Method:</strong> Credit Card ending in ****1234</p>
                    </div>'
        ?>


    </div>