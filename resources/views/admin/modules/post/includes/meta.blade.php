<h6 class="card-title mt-4">{{ __('Meta') }}</h6>
                                                    <p class="mb-4 text-muted small">{{ __('Meta Description') }}</p>

                                                    <x-form.input
                                                        type="text"
                                                        name="og_title"
                                                        :label="__('form.og') . __('form.title')"
                                                        :cols="['col-2','col-10']"
                                                        :value="(old('og_title') ? old('og_title') : (@$post ? $post->og_title : null))"
                                                    />

                                                    <x-form.textarea
                                                        name="og_description"
                                                        maxLength="200"
                                                        :label="__('form.og') .  __('form.intro')"
                                                        :cols="['col-2','col-10']"
                                                        :value="(old('og_description') ? old('og_description') : (@$post ? $post->og_description : null))"
                                                    />

                                                    <x-form.slug
                                                        name="og_url"
                                                        slugField="title"
                                                        :label="__('form.og') . __('form.url')"
                                                        :model="@$post"
                                                        :modelName="\App\Models\Post::where('id', @$post->parent_id)->first()"
                                                        :cols="['col-2','col-10']"
                                                        :value="(old('og_url') ? old('og_url') : (@$post ? $post->og_url : null))"
                                                    />

                                                    <x-form.select
                                                        name="og_type"
                                                        :required="true"
                                                        :label="__('form.og') . __('form.type')"
                                                        :cols="['col-2', 'col-3']"
                                                        :value="(old('og_type') ? old('og_type') : (@$post ? $post->og_type : null))"
                                                        :options="[
                                                           'website'   =>  __('form.website'),
                                                           'article'   =>  __('form.article'),
                                                        ]"
                                                        :disabledOption="__('form.select_type')"
                                                    />

                                                    <x-form.select
                                                        name="og_locale"
                                                        :required="true"
                                                        :label="__('form.og') . __('form.locale')"
                                                        :cols="['col-2', 'col-3']"
                                                        :value="(old('og_locale') ? old('og_locale') : (@$post ? $post->og_locale : null))"
                                                        :options="\App\Models\Locale::all()->sortBy('name')"
                                                        :valueWrapper="['locale', 'name']"
                                                        :disabledOption="__('form.select_locale')"
                                                    />

                                                    <x-form.file
                                                        name="ogImage"
                                                        :label="__('form.og') . __('form.image')"
                                                        :file="(@$post ? $post->getFirstMediaUrl('ogImage') : null)"
                                                        extensions="jpg jpeg png"
                                                        :description="__('form.image_description_og')"
                                                    />
