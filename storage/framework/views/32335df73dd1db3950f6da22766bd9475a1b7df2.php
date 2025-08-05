
<body style="background-color:#f3f4f6; font-family: sans-serif; margin: 0; padding: 20px;">
  <div style="max-width: 640px; margin: 0 auto; padding: 24px;">
    <div style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); overflow: hidden;">
      <div style="width: 100%; height: 256px;">
        <img src="images/logos/LOGO_EMAIL.png" alt="Logo FiestaRioja" style="width: 100%; height: 100%; object-fit: cover;" />
      </div>
      <div style="padding: 32px; background-color: #fef3c7;">
        <h1 style="font-size: 28px; font-weight: bold; color: #052e16; margin-bottom: 16px;">Nueva sugerencia de festivo</h1>
        <div style="display: flex; flex-wrap: wrap; gap: 24px; margin-bottom: 32px;">
          <div style="flex: 1 1 45%; display: flex; align-items: flex-start;">
            <div style="margin-right: 12px;">
              <i class="fa-solid fa-champagne-glasses" style="font-size: 24px; color: #3b82f6;"></i>
            </div>
            <div>
              <h3 style="font-size: 18px; font-weight: 600; color: #052e16;">Nombre del festivo</h3>
              <p style="margin-top: 8px; color: #4b5563;"><?php echo e($nombre); ?></p>
            </div>
          </div>
          <div style="flex: 1 1 45%; display: flex; align-items: flex-start;">
            <div style="margin-right: 12px;">
              <i class="fa-solid fa-house" style="font-size: 24px; color: #3b82f6;"></i>
            </div>
            <div>
              <h3 style="font-size: 18px; font-weight: 600; color: #052e16;">Municipio</h3>
              <p style="margin-top: 8px; color: #4b5563;"><?php echo e($municipio); ?></p>
            </div>
          </div>
          <div style="flex: 1 1 45%; display: flex; align-items: flex-start;">
            <div style="margin-right: 12px;">
              <i class="fa-solid fa-calendar" style="font-size: 24px; color: #3b82f6;"></i>
            </div>
            <div>
              <h3 style="font-size: 18px; font-weight: 600; color: #052e16;">Fecha</h3>
              <p style="margin-top: 8px; color: #4b5563;"><?php echo e($fecha); ?></p>
            </div>
          </div>
          <div style="flex: 1 1 45%; display: flex; align-items: flex-start;">
            <div style="margin-right: 12px;">
              <i class="fa-solid fa-envelope" style="font-size: 24px; color: #3b82f6;"></i>
            </div>
            <div>
              <h3 style="font-size: 18px; font-weight: 600; color: #052e16;">Email</h3>
              <p style="margin-top: 8px; color: #4b5563;"><?php echo e($email); ?></p>
            </div>
          </div>
        </div>
        <div style="background-color: #f9fafb; padding: 24px; border-radius: 8px; margin-bottom: 32px;">
          <h2 style="font-size: 24px; font-weight: bold; color: #052e16; margin-bottom: 16px;">Breve descripcion</h2>
          <p style="color: #4b5563; margin-bottom: 16px;"><?php echo e($descripcion); ?></p>
        </div>
        <div style="text-align: center;">
          <a href="<?php echo e(route('index')); ?>" style="display: inline-block; background-color: #2563eb; color: #ffffff; font-weight: 600; padding: 12px 32px; border-radius: 8px; text-decoration: none;">
            Learn More
          </a>
        </div>
      </div>
      <div style="background-color: #f9fafb; padding: 24px; margin-top: 32px;">
        <p style="font-size: 14px; color: #4b5563; text-align: center;">
          Questions? Contact our support team at support@example.com
        </p>
      </div>
    </div>
  </div>
</body>
<?php /**PATH C:\UniServerZ\www\FIESTARIOJA\fiestarioja\resources\views/mails/contacto.blade.php ENDPATH**/ ?>