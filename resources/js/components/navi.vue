<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <a class="navbar-brand" href="#">Recipe Book</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <ul class="nav ml-auto">

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="#">Home</a>
                    <a class="nav-item nav-link" href="#">Login</a>
                    <a class="nav-item nav-link" href="#">Register</a>
                    <a class="nav-item nav-link" href="#">Logout</a>

                </div>
            </div>

        </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        name: "navi"
    }
</script>

<style scoped>

</style>
