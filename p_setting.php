<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .message {
            text-align: center;
            margin: 20px 0;
            color: #555;
        }
        .pay-button {
            padding: 6px 12px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Billing Information for John Doe</h2>

        <!-- Unpaid Bills Section -->
        <h3>Unpaid Bills</h3>
        <table id="unpaid-bills">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Services</th>
                    <th>Total Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Unpaid bills will be added here -->
            </tbody>
        </table>
        <p class="message" id="unpaid-message">No unpaid bills found.</p>

        <!-- Paid Bills Section -->
        <h3>Paid Bills</h3>
        <table id="paid-bills">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Services</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <!-- Paid bills will be added here -->
            </tbody>
        </table>
        <p class="message" id="paid-message">No paid bills found.</p>
    </div>

    <script>
        // Hardcoded billing data
        const billingData = [
            { date: '2025-01-18', services: [{ name: 'General Checkup', cost: 50 }, { name: 'X-Ray', cost: 100 }], status: 'unpaid' },
            { date: '2025-01-17', services: [{ name: 'Blood Test', cost: 30 }, { name: 'ECG', cost: 60 }], status: 'paid' },
            { date: '2025-01-16', services: [{ name: 'MRI Scan', cost: 200 }], status: 'unpaid' },
        ];

        // Function to populate tables
        function populateBillingTables() {
            const unpaidTableBody = document.querySelector('#unpaid-bills tbody');
            const paidTableBody = document.querySelector('#paid-bills tbody');
            const unpaidMessage = document.getElementById('unpaid-message');
            const paidMessage = document.getElementById('paid-message');

            let unpaidCount = 0;
            let paidCount = 0;

            // Loop through the billing data and add rows to tables
            billingData.forEach((bill, index) => {
                const row = document.createElement('tr');
                const serviceList = bill.services.map(service => `${service.name} ($${service.cost.toFixed(2)})`).join('<br>');
                const totalCost = bill.services.reduce((sum, service) => sum + service.cost, 0);

                row.innerHTML = `
                    <td>${bill.date}</td>
                    <td>${serviceList}</td>
                    <td>$${totalCost.toFixed(2)}</td>
                `;

                if (bill.status === 'unpaid') {
                    const actionCell = document.createElement('td');
                    const payButton = document.createElement('button');
                    payButton.textContent = 'Pay Now';
                    payButton.className = 'pay-button';
                    payButton.onclick = () => payBill(index);

                    actionCell.appendChild(payButton);
                    row.appendChild(actionCell);

                    unpaidTableBody.appendChild(row);
                    unpaidCount++;
                } else if (bill.status === 'paid') {
                    paidTableBody.appendChild(row);
                    paidCount++;
                }
            });

            // Show or hide "No bills found" messages
            unpaidMessage.style.display = unpaidCount > 0 ? 'none' : 'block';
            paidMessage.style.display = paidCount > 0 ? 'none' : 'block';
        }

        // Function to pay a bill
        function payBill(index) {
            billingData[index].status = 'paid';
            alert(`Bill for services on ${billingData[index].date} has been paid.`);
            refreshTables();
        }

        // Function to refresh tables
        function refreshTables() {
            document.querySelector('#unpaid-bills tbody').innerHTML = '';
            document.querySelector('#paid-bills tbody').innerHTML = '';
            populateBillingTables();
        }

        // Call the function to populate the tables
        populateBillingTables();
    </script>
</body>
</html>
