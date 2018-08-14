
        <div class="row">
            <div class="col-md-12">
                <div class="row" style="margin-top: 3%;">
                    <section class="content-header">
                        <h1>
                            Assign Permissions
                        </h1>
                    </section>
                </div>

                <div class="row" style="margin-top: 2%;">
                    <div class="col-md-1" style="text-align: center; vertical-align: middle; padding: 0.3%">
                        {!! Form::checkbox('AllCheck', 1, (count($Permissions) == count($CheckedPermissions))?true:false, array(
                            'id' => 'AllCheck',
                            'class' => ''
                        )) !!}
                        <label for="AllCheck">
                            <span></span>
                            <span class="check" data-toggle="tooltip" data-original-title="Un-assign All Sections"></span>
                            <span class="box" data-toggle="tooltip" data-original-title="Assign All Sections"></span>
                        </label>
                    </div>
                    <div class="col-md-2">
                        <h4>Section</h4>
                    </div>
                    <div class="col-md-9">
                        <h4>Permissions</h4>
                    </div>
                </div>
                @foreach($Sections as $section)

                    @php
                        $TotalPermissionsInThisSection = count($Permissions->filter(function ($item, $key) use ($section) {
                                                                                    if($item->module == $section)
                                                                                        return $item;
                                                                                }));

                        $TotalCheckedInThisSection = 0;

                        if($CheckedPermissions != null){
                            $TotalCheckedInThisSection = count($CheckedPermissions->filter(function ($item, $key) use ($section) {
                                                                                        if($item->module == $section)
                                                                                            return $item;
                                                                                    }));
                        }
                    @endphp

                    <hr>

                    @if($section == 'Permission')
                        <div class="row hide">
                    @else
                        <div class="row">
                    @endif

                        <div class="col-md-1" style="text-align: center; vertical-align: middle; padding: 0.3%">
                            {!! Form::checkbox('Section['.$section.']', $section, ($TotalPermissionsInThisSection == $TotalCheckedInThisSection)?true:false, array(
                                'id' => $section,
                                'class' => 'sections'
                            )) !!}
                            <label for="{{ $section }}">
                                <span></span>
                                <span class="check" data-toggle="tooltip" data-original-title="Un-assign This Section"></span>
                                <span class="box" data-toggle="tooltip" data-original-title="Assign This Section"></span>
                            </label>
                        </div>
                        <div class="col-md-2">
                            <h5>{{ $section }}</h5>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach($Permissions as $permission)
                                        @if($permission->module == $section)
                                            {!! Form::checkbox('Permission['.$permission->id.']', $permission->id, ($CheckedPermissions != null)?(array_has($CheckedPermissions->keyBy('id')->toArray(), $permission->id))?true:false:false, array(
                                                'id' => $permission->id,
                                                'class' => $section.' permissions'
                                            )) !!}
                                            <label for="{{ $permission->id }}">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> {{ $permission->display_name }}
                                            </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>