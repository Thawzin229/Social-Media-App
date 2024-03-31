<template>
    <!-- right chat -->
    <div class="right-chat nav-wrap mt-2 right-scroll-bar">
        <div
            class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl"
        >
            <!-- loader wrapper -->
            <div class="preloader-wrap p-3">
                <div class="box shimmer">
                    <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                    </div>
                </div>
                <div class="box shimmer mb-3">
                    <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                    </div>
                </div>
                <div class="box shimmer">
                    <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                    </div>
                </div>
            </div>
            <!-- loader wrapper -->

            <div
                class="section full pe-3 ps-4 pt-4 position-relative feed-body"
            >
                <h4
                    class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3"
                >
                    CONTACTS
                </h4>
                <ul class="list-group list-group-flush">
                    <li
                        v-for="(item, index) in user_list.data"
                        :key="index"
                        class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center"
                    >
                        <figure class="avatar float-left mb-0 me-2">
                            <img
                                v-if="item.image"
                                :src="
                                    'http://127.0.0.1:8000/storage/' +
                                    item.image
                                "
                                alt="image"
                                class="w35"
                            />
                            <img
                                v-if="!item.image"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTankSsu2BpytPCD6rW9fepjX_hbXKn8zOYHA&s"
                                alt="image"
                                class="w35"
                            />
                        </figure>
                        <h3 class="fw-700 mb-0 mt-0">
                            <Link
                                :href="'user/profile/' + item.id"
                                class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                >{{ item.name }}</Link
                            >
                        </h3>
                        <span
                            class="badge badge-primary text-white badge-pill fw-500 mt-0"
                            >2</span
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- right chat -->

    <div class="app-footer border-0 shadow-lg bg-primary-gradiant">
        <a href="default.html" class="nav-content-bttn nav-center"
            ><i class="feather-home"></i
        ></a>
        <a href="default-video.html" class="nav-content-bttn"
            ><i class="feather-package"></i
        ></a>
        <a
            href="default-live-stream.html"
            class="nav-content-bttn"
            data-tab="chats"
            ><i class="feather-layout"></i
        ></a>
        <a href="shop-2.html" class="nav-content-bttn"
            ><i class="feather-layers"></i
        ></a>
        <a href="default-settings.html" class="nav-content-bttn"
            ><img
                src="images/female-profile.png"
                alt="user"
                class="w30 shadow-xss"
        /></a>
    </div>

    <div class="app-header-search">
        <form class="search-form">
            <div class="form-group searchbox mb-0 border-0 p-1">
                <input
                    type="text"
                    class="form-control border-0"
                    placeholder="Search..."
                />
                <i class="input-icon">
                    <ion-icon
                        name="search-outline"
                        role="img"
                        class="md hydrated"
                        aria-label="search outline"
                    ></ion-icon>
                </i>
                <a
                    href="#"
                    class="ms-1 mt-1 d-inline-block close searchbox-close"
                >
                    <i class="ti-close font-xs"></i>
                </a>
            </div>
        </form>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    props: { user_list: Object },
    components: { Link },
};
</script>

<style></style>
