<?php $__env->startSection('title'); ?>
    Email sent in Your Mailbox

<?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <h2  style="margin-top: 200px;">Verification Email sent In your Email.Please check your mail & click verify to logIn. </h2>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DeMeraki\resources\views/web/userAccount/email_message.blade.php ENDPATH**/ ?>