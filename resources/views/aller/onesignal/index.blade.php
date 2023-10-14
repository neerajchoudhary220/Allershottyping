@extends('aller.layout.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">ONESINGAL </h3>
    </div>

    @push('internal-js')
    <script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
    <script>
      window.OneSignalDeferred = window.OneSignalDeferred || [];
      OneSignalDeferred.push(function(OneSignal) {
        OneSignal.init({
          appId: "246e973f-1603-4faf-8a0a-25246d9cd4dd",
          safari_web_id: "web.onesignal.auto.283a79e5-74a1-4b9f-8067-e75dbf426ba4",
          notifyButton: {
            enable: true,
          },
          allowLocalhostAsSecureOrigin: true,
        });
      });
    </script>
    @endpush
@endsection
