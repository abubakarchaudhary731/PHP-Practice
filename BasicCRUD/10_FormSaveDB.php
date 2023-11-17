<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center mt-5"> <?php echo "Data stored in DataBase using PHP" ?>  </h1>

    <div class="container mt-5">
        <form class="row g-3 needs-validation" novalidate action="./10_SaveData.php" method="post">
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label"> Name</label>
              <input type="text" class="form-control" id="validationCustom01" value="Abu Bakar" name="name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
           
            <div class="col-md-4">
              <label for="validationCustomUsername" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="username" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom03" class="form-label">City</label>
              <input type="text" class="form-control" id="validationCustom03" name="city" required>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom04" class="form-label">State</label>
              <select class="form-select" id="validationCustom04" name="state" required>
                <option selected value="none">Choose...</option>
                <option selected value="punjab"> Punjab </option>
                <option selected value="sindh"> Sindh </option>
                <option selected value="balochistan"> Balochistan </option>
                <option selected value="kpk"> KPK </option>
              </select>
              <div class="invalid-feedback">
                Please select a valid state.
              </div>
            </div>
           
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck"  name="check">
                <label class="form-check-label" for="invalidCheck">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
          </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
    </script>
  </body>
</html>