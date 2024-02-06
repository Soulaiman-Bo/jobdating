<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>
    @component('components.nav')
    @endcomponent

    @component('components.aside')
    @endcomponent


    <div class=" p-4 sm:ml-64">
        <div
            class="p-4 border-2 min-h-[100vh] bg-gray-200 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="flex flex-col my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
                @yield('content')
            </div>
        </div>

        <!-- Main modal -->

        <div id="modal" class="modal centered-div hidden fixed inset-0 z-[100] overflow-y-auto"
            aria-labelledby="modal-title" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div aria-hidden="true"
                        class="centered-div  overflow-y-auto overflow-x-hidden  z-50 justify-center items-center w-full max-w-[450px] ">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Update Category
                                    </h3>

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                        <span class="sr-only">Close modal</span>
                                    </button>

                                </div>

                                <div class="p-4 md:p-5">
                                    <form method="post" id="updateCategoryForm" action="/api/category/updatecategory"
                                        class="space-y-4">
                                        <input id="idInput" type="hidden" name="id" value="" />
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                            <input type="text" name="categoryname" id="updateCategory"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                            <span id="updateCategoryError" class="ml-2 text-red-500"></span>
                                        </div>
                                        <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden z-[90] fixed inset-0 bg-black/50 backdrop-blur-sm bg-opacity-75"></div>

    </div>

</body>

<script>
    let userMenu = document.getElementById("userMenu");
    let userDropdown = document.getElementById("userDropdown");

    userMenu.addEventListener("click", (e) => {
        userDropdown.classList.toggle("hidden")
    })
</script>
<script>
    async function updatecategory(id) {
        console.log(id);
        const modal = document.getElementById("modal");
        const backdrop = document.querySelector(".backdrop-blur-sm");
        modal.classList.remove("hidden");
        backdrop.classList.remove("hidden");

        let categorynam = "";

        try {
            const response = await fetch(`/api/category/getone?id=${id}`, {
                method: 'GET',
            });

            const data = await response.json();

            if (response.ok) {
                categorynam = data[0].name;
            }
            if (!response.ok) {

                throw new Error(`HTTP error! Status: ${response.status}`);
            }

        } catch (error) {
            console.error("Error during fetch:", error);
        }

        let idInput = document.getElementById("idInput");
        idInput.value = id;

        let nameInput = document.getElementById("nameInput");
        nameInput.value = categorynam;



    }



    const closeModalButtons = document.querySelectorAll("[data-bs-dismiss='modal']");
    closeModalButtons.forEach(button => {
        button.addEventListener("click", () => {
            const modal = document.getElementById("modal");
            const backdrop = document.querySelector(".backdrop-blur-sm");
            modal.classList.add("hidden");
            backdrop.classList.add("hidden");
        });
    });
</script>



</html>
