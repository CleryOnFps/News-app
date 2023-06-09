{{-- @dd($actu) --}}
<form action="{{!empty($actu)?route('news.edit', $actu->id):route('news.add')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-5">
      <label for="name" class="mb-3 block text-base font-medium text-black">Titre</label>
      <input type="text" value="{{!empty($actu)?$actu->titre : ''}}" name="titre" placeholder="Saisissez un titre"
          class="w-full rounded-md border-[#e9e9e9] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
      @error('titre')
          vous devez saisir un titre
      @enderror
  </div>
  <div class="mb-5">
      <label for="image" class="mb-3 block text-base font-medium text-">Image</label>
      <input type="file" name="image" placeholder="Saisissez une image"
          class="w-full rounded-md border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
      @error('image')
          vous devez saisir une image
      @enderror
  </div>

  <div class="mb-5">
    <label for="name" class="mb-3 block text-base font-medium text-black">Description</label>
    <textarea name="description" class="w-full resize-none rounded-md border-zinc-50 bg-white" cols="30" rows="10">{{!empty($actu)?$actu->description : ''}}</textarea>
</div>
  

<div class="mb-5">
      <button
          class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">{{!empty($actu)?'Modifier': 'Ajouter'}}</button>
  </div>
</form>