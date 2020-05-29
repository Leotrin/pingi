<div class="modal fade" id="newWebsiteMonitoring" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">New monitoring</h4>
            </div>
            <div class="modal-body">
                <form action="/website/new" method="post">
                    @csrf
                    <label>Url</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><small>https://</small></span>
                        </div>
                        <input type="text" class="form-control" name="url" placeholder="google.com" aria-label="url" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <label>Refresh Rate</label>
                    <select class="form-control" name="refresh">
                        <option value="10">10 minutes</option>
                        <option value="15">15 minutes</option>
                        <option value="30" selected>30 minutes</option>
                        <option value="60">60 minutes</option>
                        <option value="360">6 hours</option>
                        <option value="720">12 hours</option>
                        <option value="1440">24 hours</option>
                    </select>
                    <br />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary">SAVE & MONITOR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
