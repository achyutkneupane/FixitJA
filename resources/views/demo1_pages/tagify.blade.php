@extends('demo1_layout.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">Tags Input Examples</h3>
            </div>
            <!--begin::Form-->
            <form class="form" action="?" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Basic example</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <tags class="tagify form-control" tabindex="-1">
                                <tag title="css" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="css">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">css</span></div>
                                </tag>
                                <tag title="html" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="html">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">html</span></div>
                                </tag>
                                <tag title="javascript" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="javascript">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">javascript</span></div>
                                </tag><span contenteditable="" data-placeholder="type..." aria-placeholder="type..." class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                            </tags><input id="kt_tagify_1" class="form-control tagify" name="tags" placeholder="type..." value="css, html, javascript" autofocus="" data-blacklist=".NET,PHP">
                            <div class="mt-3">
                                <a href="javascript:;" id="kt_tagify_1_remove" class="btn btn-sm btn-light-primary font-weight-bold">Remove tags</a>
                            </div>
                            <div class="mt-3 text-muted">In this example, the field is pre-occupied with 4 tags. The last tag (CSS) has the same value as the first tag, and will be removed, because the duplicates setting is set to true.</div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Readonly example</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <tags class="tagify form-control" readonly="" tabindex="-1">
                                <tag title="css" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="css">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">css</span></div>
                                </tag>
                                <tag title="html" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="html">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">html</span></div>
                                </tag>
                                <tag title="javascript" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="javascript">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">javascript</span></div>
                                </tag>
                                <tag title="laravel" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag " aria-readonly="true" __isvalid="true" readonly="true" color="yellow" value="laravel">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">laravel</span></div>
                                </tag><span contenteditable="" data-placeholder="type..." aria-placeholder="type..." class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                            </tags><input id="kt_tagify_1_1" class="form-control tagify" name="tags" readonly="readonly" placeholder="type..." value="css, html, javascript" autofocus="" data-blacklist=".NET,PHP">
                            <div class="mt-3 text-muted">If the original input field has a readonly attribute, then, via CSS, there will be no way of manually adding tags because the inline contenteditable element will be hidden.</div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Whitelist examples</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <tags class="tagify form-control" tabindex="-1">
                                <tag title="Back to the Future" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="Back to the Future">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">Back to the Future</span></div>
                                </tag>
                                <tag title="Whiplash" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="Whiplash">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">Whiplash</span></div>
                                </tag><span contenteditable="" data-placeholder="type..." aria-placeholder="type..." class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                            </tags><input id="kt_tagify_2" class="form-control tagify" placeholder="type..." value="Back to the Future, Whiplash" data-blacklist=".NET,PHP">
                            <div class="mt-3 text-muted">In this example, the field is pre-occupied with 3 tags, and last tag is not included in the whitelist, and will be removed because the enforce whitelist option flag is set to true</div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Templates examples</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <tags class="tagify form-control" tabindex="-1">
                                <tag title="Chris Muller" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--primary tagify--noAnim" __isvalid="true" pic="./assets/media/users/100_11.jpg" initialsstate="" initials="" email="chris.muller@wix.com" value="Chris Muller">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">Chris Muller</span></div>
                                </tag>
                                <tag title="Lina Nilson" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--primary tagify--noAnim" __isvalid="true" pic="./assets/media/users/100_15.jpg" initialsstate="danger" initials="LN" email="lina.nilson@loop.com" value="Lina Nilson">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">Lina Nilson</span></div>
                                </tag><span contenteditable="" data-placeholder="Add users" aria-placeholder="Add users" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                            </tags><input id="kt_tagify_5" class="form-control tagify" name="tags3" placeholder="Add users" value="Chris Muller, Lina Nilson">
                            <div class="mt-3 text-muted">Dropdown item and tag templates.</div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Outside of the box example</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <span contenteditable="" data-placeholder="Write some tags" aria-placeholder="Write some tags" class="tagify__input form-control" role="textbox" aria-autocomplete="both" aria-multiline="false" placeholder="enter tag..."></span>
                            <tags class="tagify form-control tagify--outside" tabindex="-1">
                                <tag title="css" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="css">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">css</span></div>
                                </tag>
                                <tag title="html" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="html">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">html</span></div>
                                </tag>
                                <tag title="javascript" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" __isvalid="true" value="javascript">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">javascript</span></div>
                                </tag>
                            </tags><input id="kt_tagify_3" name="tags-outside" class="form-control tagify tagify--outside" value="css, html, javascript" placeholder="Write some tags">
                            <div class="mt-3 text-muted">Some cases might require addition of tags from outside of the box and not within.</div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Theme Colorss</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <tags class="tagify form-control tagify--hasMaxTags" tabindex="-1">
                                <tag title="css" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--success tagify--noAnim" __isvalid="true" value="css">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">css</span></div>
                                </tag>
                                <tag title="html" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--primary tagify--noAnim" __isvalid="true" value="html">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">html</span></div>
                                </tag>
                                <tag title="javascript" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--danger tagify--noAnim" __isvalid="true" value="javascript">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">javascript</span></div>
                                </tag>
                                <tag title="angular" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--primary tagify--noAnim" __isvalid="true" value="angular">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">angular</span></div>
                                </tag>
                                <tag title="vue" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--primary tagify--noAnim" __isvalid="true" value="vue">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">vue</span></div>
                                </tag>
                                <tag title="react" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--success tagify--noAnim" __isvalid="true" value="react">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">react</span></div>
                                </tag><span contenteditable="" data-placeholder="Write some tags" aria-placeholder="Write some tags" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                            </tags><input id="kt_tagify_4" class="form-control" name="tags3" placeholder="Write some tags" value="css, html, javascript, angular, vue, react">
                            <div class="mt-3 text-muted">In this example, the dropdown.enabled setting is set (minimum charactes typed to show the dropdown) to 3. Maximum number of tags is set to 6</div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Theme Light Colors</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <tags class="tagify form-control tagify--hasMaxTags" tabindex="-1">
                                <tag title="css" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag-light--info tagify--noAnim" __isvalid="true" value="css">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">css</span></div>
                                </tag>
                                <tag title="html" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag-light--warning tagify--noAnim" __isvalid="true" value="html">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">html</span></div>
                                </tag>
                                <tag title="javascript" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag-light--warning tagify--noAnim" __isvalid="true" value="javascript">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">javascript</span></div>
                                </tag>
                                <tag title="angular" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag-light--danger tagify--noAnim" __isvalid="true" value="angular">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">angular</span></div>
                                </tag>
                                <tag title="vue" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag-light--success tagify--noAnim" __isvalid="true" value="vue">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">vue</span></div>
                                </tag>
                                <tag title="react" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag-light--success tagify--noAnim" __isvalid="true" value="react">
                                    <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                    <div><span class="tagify__tag-text">react</span></div>
                                </tag><span contenteditable="" data-placeholder="Write some tags" aria-placeholder="Write some tags" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                            </tags><input id="kt_tagify_6" class="form-control" name="tags4" placeholder="Write some tags" value="css, html, javascript, angular, vue, react">
                            <div class="mt-3 text-muted">In this example, the dropdown.enabled setting is set (minimum charactes typed to show the dropdown) to 3. Maximum number of tags is set to 6</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>
@endsection
{{-- Styles Section --}}
@section('styles')
    <!-- <link href="{{ asset('css/pages/wizard/wizard-1.css') }}" rel="stylesheet" type="text/css"/> -->
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/tagify.js') }}" type="text/javascript"></script>
@endsection
