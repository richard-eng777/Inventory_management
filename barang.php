<?php include '.includes/header.php'; ?>

<h4 class="fw-bold py-3 mb-4">Form Layout Vertical</h4>

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Basic Layout</h5>
                <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
                <form action="proses.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Full Name</label>
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama" placeholder="John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Email</label>
                        <input type="email" class="form-control" id="basic-default-email" name="email" placeholder="john@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Phone No</label>
                        <input type="text" class="form-control" id="basic-default-phone" name="phone" placeholder="123-456-7890">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Message</label>
                        <textarea class="form-control" id="basic-default-message" name="message" placeholder="Your message here..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '.includes/footer.php'; ?>
