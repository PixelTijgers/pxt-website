<h6 class="card-title mt-4">{{ __('Content') }}</h6>
                                                    <p class="mb-4 text-muted small">{{ __('Content Description') }}</p>

                                                    <x-form.input
                                                        type="text"
                                                        name="title"
                                                        :label="__('Title')"
                                                        :value="(old('title') ? old('title') : (@$post ? $post->title : null))"
                                                    />

                                                    <x-form.textarea
                                                        name="intro"
                                                        maxLength="165"
                                                        :label="__('Intro')"
                                                        :value="(old('intro') ? old('intro') : (@$post ? $post->intro : null))"
                                                    />

                                                    <x-form.rich-text
                                                        name="content"
                                                        :label="__('Content')"
                                                        :value="(old('content') ? old('content') : (@$post ? $post->content : null))"
                                                    />

                                                    <div class="row">

                                                        <div class="col-md-4">

                                                            <x-form.select
                                                                name="category_id"
                                                                :required="true"
                                                                :label="__('Category')"
                                                                :cols="['col-3', 'col-4']"
                                                                :value="(old('category_id') ? old('category_id') : (@$post ? $post->category_id : null))"
                                                                :options="\App\Models\Category::all()->sortBy('name')"
                                                                :valueWrapper="['id', 'name']"
                                                                :disabledOption="__('Select Category')"
                                                            />

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4">

                                                            <x-form.select
                                                                name="administrator_id"
                                                                :required="true"
                                                                :label="__('Author')"
                                                                :cols="['col-3', 'col-4']"
                                                                :value="(old('administrator_id') ? old('administrator_id') : (@$post ? $post->administrator_id : null))"
                                                                :options="\App\Models\Administrator::all()->sortBy('name')"
                                                                :valueWrapper="['id', 'name']"
                                                                :disabledOption="__('Select Administrator')"
                                                            />

                                                        </div>

                                                    </div>
