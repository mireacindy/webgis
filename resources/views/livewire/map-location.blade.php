<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header bg-dark text-white">
              MapBox
            </div>
            <div class="card-body">
            <div wire:ignore id='map' style='width: 99%; height: 70vh;'></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-dark text-white">
              Form
            </div>
            <div class="card-body"> 
                <div class="row">
                  <div class="col-sm-8">
                    <div class="form-group">
                    <label>longtitude</label>
                    <input wire:model="long" type="text" class="form-control">
                  </div>
                  <div class="col-sm-8">
                  <div class="form-group">
                    <label>lattitude</label>
                    <input wire:model="lat" type="text" class="form-control">
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
     document.addEventListener('livewire:load',() =>{
      const defaultLocation = [106.63710129839598, -6.182801864515071]
  mapboxgl.accessToken = '{{ env("MAPBOX_KEY") }}';
  var map = new mapboxgl.Map({
    container: 'map',
    center: defaultLocation,
    zoom:11.15,
});

map.setStyle('mapbox://styles/mapbox/dark-v10')

map.addControl(new mapboxgl.NavigationControl())

map.on('click',(e)=>{
  const longtitude = e.lngLat.lng
  const lattitude = e.lngLat.lat

    @this.long  = longtitude
    @this.lat = lattitude

})
     })
    </script>
@endpush
