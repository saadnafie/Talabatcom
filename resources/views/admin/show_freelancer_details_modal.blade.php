<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <h5 class="modal-title" id="exampleModalLabel">تفاصيل الاعلان</h5>

      </div>
      <div class="modal-body">
        <p>العنوان: {{$freelancerService->title}}</p>
        <p>السعر: {{$freelancerService->price}}</p>
        <p>التفاصيل: {{$freelancerService->description}}</p>
      </div>
    </div>
  </div>
</div>
