<body style="background-color:#f3f4f6; font-family: sans-serif; margin:0; padding:20px;">
  <div style="max-width:640px; margin:0 auto; padding:24px;">
    <div style="background-color:#ffffff; border-radius:8px; box-shadow:0 4px 6px rgba(0,0,0,0.1); overflow:hidden;">
      <div style="width:100%; height:256px;">
        <img src="https://i.imgur.com/HGMAV3I.png" alt="Logo FiestaRioja" style="width:100%; height:100%; object-fit:cover;">
      </div>
      <div style="padding:32px; background-color:#fef3c7;">
        <h1 style="font-size:28px; font-weight:bold; color:#052e16; margin-bottom:24px;">Nueva sugerencia de festivo</h1>

        <!-- Datos en columna -->
        <div style="margin-bottom:32px;">
          <div style="margin-bottom:16px;">
            <h3 style="font-size:18px; font-weight:600; color:#052e16; margin:0;">Nombre del festivo</h3>
            <p style="margin:4px 0 0; color:#4b5563;"><?php echo e($nombre); ?></p>
          </div>
          <div style="margin-bottom:16px;">
            <h3 style="font-size:18px; font-weight:600; color:#052e16; margin:0;">Municipio</h3>
            <p style="margin:4px 0 0; color:#4b5563;"><?php echo e($municipio); ?></p>
          </div>
          <div style="margin-bottom:16px;">
            <h3 style="font-size:18px; font-weight:600; color:#052e16; margin:0;">Fecha</h3>
            <p style="margin:4px 0 0; color:#4b5563;"><?php echo e($fecha); ?></p>
          </div>
          <div>
            <h3 style="font-size:18px; font-weight:600; color:#052e16; margin:0;">Email</h3>
            <p style="margin:4px 0 0; color:#4b5563;"><?php echo e($email); ?></p>
          </div>
        </div>

        <!-- Descripción -->
        <div style="background-color:#FDE68A; padding:24px; border-radius:8px; margin-bottom:32px;">
          <h2 style="font-size:24px; font-weight:bold; color:#052e16; margin-bottom:16px;">Breve descripcion</h2>
          <p style="color:#4b5563; margin:0;"><?php echo e($descripcion); ?></p>
        </div>

        <!-- Botón -->
        <div style="text-align:center;">
          <a href="<?php echo e(route('index')); ?>" style="display:inline-block; background-color:#FACC15; color:#052e16; font-weight:600; padding:12px 32px; border-radius:8px; text-decoration:none;">
            Ir a la web
          </a>
        </div>
      </div>
    </div>
  </div>
</body><?php /**PATH C:\UniServerZ\www\FIESTARIOJA\fiestarioja\resources\views/mails/contacto.blade.php ENDPATH**/ ?>