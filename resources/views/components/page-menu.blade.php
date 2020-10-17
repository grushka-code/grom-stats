@foreach($directories as $directory)
    <span
       class="page-link text-center list-link directory-menu-links  ">{{{$directory->title}}}</span>
    <i class="dropdown-container"

       style="display:
       @if($directory->id == $model->directory_id)
           block
       @else
           none
       @endif"
    >
        @foreach($directory->pages as $page)
            <a href="{{{route('pages.page',$page->slug)}}}"
               class="page-link text-center list-link page-menu-links @if($page->id == $model->id) active @endif "><i>{{{$page->title}}}</i></a>
        @endforeach
    </i>
@endforeach

<script>
    (function () {
        let dropdown = document.getElementsByClassName("directory-menu-links");
        let i;

        for (i = 0; i < dropdown.length; i++) {

            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("opened");
                let dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }

    })()
</script>
