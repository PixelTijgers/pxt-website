<h6 class="card-title mt-4">{{ __('form.publication') }}</h6>
                                                    <p class="mb-4 text-muted small">{{ __('form.publication_description') }}</p>
                                                    <x-form.switcher
                                                        name="published"
                                                        :label="__('form.published')"
                                                        :value="(old('published') === null ? (@$post ? $post->published : 1) : 0)"
                                                    />
                                                    <x-form.date-time
                                                        name="published_at"
                                                        :label="__('form.published_at')"
                                                        :value="(old('published_at') ? old('published_at') : (@$post ? $post->published_at : null))"
                                                        :description="__('form.published_at_description')"
                                                    />

                                                    <x-form.date-time
                                                        name="unpublished_at"
                                                        :label="__('form.unpublished_at')"
                                                        :required="false"
                                                        :value="(old('unpublished_at') ? old('unpublished_at') : (@$post ? $post->unpublished_at : null))"
                                                        :description="__('form.unpublished_at_description')"
                                                    />
