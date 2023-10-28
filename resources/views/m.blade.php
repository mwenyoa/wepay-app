<!DOCTYPE html>
<html>
<head>
    <title>Create Cardholder</title>
</head>
<body>
    <h1>Create Cardholder</h1>

    <form action="{{ route('cardholder.store') }}" method="POST">

        @csrf
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br>

        <label for="line1">Address Line 1:</label>
        <input type="text" id="line1" name="line1" required><br>

        <label for="line2">Address Line 2:</label>
        <input type="text" id="line2" name="line2" required><br>

        <label for="postalCode">Postal Code:</label>
        <input type="text" id="postalCode" name="postalCode" required><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phoneNumber" required><br>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br>

        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" id="dateOfBirth" name="dateOfBirth" required><br>

        <label for="idType">ID Type:</label>
        <select id="idType" name="idType">
            <option value="passport">Passport</option>
            <option value="other">Other</option>
        </select><br>

        <label for="documentId">Document ID:</label>
        <input type="text" id="documentId" name="documentId" required><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br>

        <input type="submit" value="Create Cardholder">
    </form>
</body>
</html>

