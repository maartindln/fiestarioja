@php
    $fixedUrl = str_replace('http://localhost', 'https://localhost/fiestarioja/fiestarioja/public', $actionUrl);
@endphp

<body style="background-color:#f3f4f6; font-family: sans-serif; margin:0; padding:20px;">
  <div style="max-width:640px; margin:0 auto; padding:24px;">
    <div style="background-color:#ffffff; border-radius:8px; box-shadow:0 4px 6px rgba(0,0,0,0.1); overflow:hidden;">

      <!-- Cabecera imagen -->
      <div style="width:100%; height:256px;">
        <img src="https://i.imgur.com/HGMAV3I.png" alt="Logo FiestaRioja" style="width:100%; height:100%; object-fit:cover;">
      </div>

      <div style="padding:32px; background-color:#fef3c7;">
        <h1 style="font-size:28px; font-weight:bold; color:#052e16; margin-bottom:8px;">Restablecer contraseña</h1>
        <p style="color:#4b5563; margin-bottom:32px;">Hemos recibido una solicitud para restablecer la contraseña de tu cuenta. Haz clic en el botón para continuar.</p>

        <!-- Botón -->
        <div style="text-align:center; margin-bottom:32px;">
          <a href="{{ $fixedUrl }}" style="display:inline-block; background-color:#FACC15; color:#052e16; font-weight:600; padding:12px 32px; border-radius:8px; text-decoration:none;">
            Restablecer contraseña
          </a>
        </div>

        <!-- Aviso -->
        <div style="background-color:#FDE68A; padding:24px; border-radius:8px; margin-bottom:32px;">
          <h2 style="font-size:16px; font-weight:bold; color:#052e16; margin-bottom:8px;">¿No solicitaste esto?</h2>
          <p style="color:#4b5563; margin:0;">Si no solicitaste restablecer tu contraseña, ignora este correo o contactanos. El enlace expirará en 60 minutos.</p>
        </div>
      </div>
    </div>
  </div>
</body>
