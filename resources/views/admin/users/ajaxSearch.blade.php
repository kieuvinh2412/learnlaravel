                            @if (!empty($users))
                            @php
                            $i = 1;    
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->full_name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><a href="{{route('users.edit', ['id' => $user->id])}}" class="btn btn-sm btn-info">Sửa</a></td>
                                    <td><a href="{{route('users.delete', ['id' => $user->id])}}" class="btn btn-sm btn-danger">Xóa</a></td>
                                </tr>
                                @php
                                $i++;    
                                @endphp
                            @endforeach
                            @endif