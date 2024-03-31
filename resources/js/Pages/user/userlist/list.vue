<template>
    <div class="main-wrapper">
        <Nav></Nav>
        <div class="main-content right-chat-active">
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3"
                            >
                                <div
                                    class="card-body d-flex align-items-center p-0"
                                >
                                    <h2
                                        class="fw-700 mb-0 mt-0 font-md text-grey-900"
                                    >
                                        Users
                                    </h2>
                                    <div class="search-form-2 ms-auto">
                                        <i class="ti-search font-xss"></i>
                                        <input
                                            v-model="search"
                                            type="text"
                                            class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0"
                                            placeholder="Search here."
                                        />
                                    </div>
                                    <a
                                        href="#"
                                        class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"
                                        ><i
                                            class="feather-filter font-xss text-grey-500"
                                        ></i
                                    ></a>
                                </div>
                            </div>

                            <div class="row ps-2 pe-1">
                                <div
                                    v-for="(user, index) in user_list.data"
                                    :key="index"
                                    class="col-md-6 col-sm-6 pe-2 ps-2"
                                >
                                    <div
                                        class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3"
                                    >
                                        <div
                                            class="card-body position-relative h100 bg-image-cover bg-image-center"
                                            style="
                                                background-image: url(images/bb-16.png);
                                            "
                                        ></div>
                                        <div
                                            class="card-body d-block w-100 pl-10 pe-4 pb-4 pt-0 text-left position-relative"
                                        >
                                            <figure
                                                class="avatar position-absolute w75 z-index-1"
                                                style="top: -40px; left: 15px"
                                            >
                                                <img
                                                    v-if="user.image"
                                                    :src="
                                                        'http://127.0.0.1:8000/storage/' +
                                                        user.image
                                                    "
                                                    style="
                                                        width: 70px;
                                                        height: 70px;
                                                        border-radius: 100%;
                                                    "
                                                    alt="image"
                                                    class="float-right p-1 bg-white"
                                                />
                                                <img
                                                    v-if="!user.image"
                                                    src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?size=626&ext=jpg&ga=GA1.1.1466268726.1691048354&semt=ais"
                                                    style="
                                                        width: 70px;
                                                        height: 70px;
                                                        border-radius: 100%;
                                                    "
                                                    alt="image"
                                                    class="float-right p-1 bg-white"
                                                />
                                            </figure>
                                            <div class="clearfix"></div>
                                            <Link
                                                :href="
                                                    '/user/profile/' + user.id
                                                "
                                            >
                                                <h4
                                                    class="fw-700 font-xsss mt-3 mb-1"
                                                >
                                                    {{ user.name }}
                                                </h4>
                                            </Link>
                                            <p
                                                class="fw-500 font-xsssss text-grey-500 mt-0 mb-3"
                                            >
                                                {{ user.email }}
                                            </p>
                                            <span
                                                class="position-absolute right-15 top-0 d-flex align-items-center"
                                            >
                                                <a
                                                    href="#"
                                                    class="d-lg-block d-none"
                                                    ><i
                                                        class="feather-video btn-round-md font-md bg-primary-gradiant text-white"
                                                    ></i
                                                ></a>
                                                <a
                                                    href="#"
                                                    class="text-center p-2 lh-24 w100 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white"
                                                    >FOLLOW</a
                                                >
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <Component
                                class="btn btn-secondary mx-1"
                                :is="link.url ? 'Link' : 'span'"
                                :href="link.url"
                                v-html="link.label"
                                v-for="(link, index) in user_list.links"
                                :key="index"
                            ></Component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Chat :user_list="user_list"></Chat>
    </div>
    <Footer></Footer>
</template>

<script>
import Chat from "../../layout/Chat.vue";
import Nav from "../../layout/Nav.vue";
import Footer from "../../layout/Footer.vue";
import debounce from "lodash/debounce";
export default {
    props: { user_list: Object },
    components: { Nav, Footer, Chat },
    data: () => ({
        search: "",
    }),
    watch: {
        search: debounce(function (val) {
            this.$inertia.get(
                "/user/list",
                { search: val },
                { preserveState: true, replace: true }
            );
        }, 600),
    },
};
</script>

<style></style>
